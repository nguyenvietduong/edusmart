<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory;

    protected $table = 'classes';

    /**
     * Các cột có thể mass assign
     */
    protected $fillable = [
        'class_code',
        'name',
        'slug',
        'photo',
        'school_year_id',
        'grade_level',
        'start_year',
        'end_year',
        'start_date',
        'end_date',
        'total_students',
        'study_shift',
        'room_name',
        'homeroom_teacher_id',
        'description',
        'is_active',
    ];

    /**
     * Casts cho các cột đặc biệt
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'start_year' => 'integer',
        'end_year' => 'integer',
        'total_students' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Liên kết với năm học
     */
    // public function schoolYear()
    // {
    //     return $this->belongsTo(SchoolYear::class, 'school_year_id');
    // }

    /**
     * Liên kết với giáo viên chủ nhiệm
     */
    public function homeroomTeacher()
    {
        return $this->belongsTo(Teacher::class, 'homeroom_teacher_id');
    }

    /**
     * Liên kết với học sinh
     */
    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }

    /**
     * Accessor: Tên đầy đủ lớp (mã + tên)
     */
    public function getFullNameAttribute()
    {
        return "{$this->class_code} - {$this->name}";
    }

    /**
     * Accessor: ca học tiếng Việt
     */
    public function getShiftLabelAttribute()
    {
        return match($this->study_shift) {
            'morning' => 'Buổi sáng',
            'afternoon' => 'Buổi chiều',
            'full_day' => 'Cả ngày',
            default => 'Không xác định',
        };
    }
}
