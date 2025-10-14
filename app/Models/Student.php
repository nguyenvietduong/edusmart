<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory, LogsActivity;

    /**
     * Các cột có thể mass assign
     */
    protected $fillable = [
        'user_id',
        'student_code',
        'date_of_birth',
        'gender',
        'phone',
        'ethnicity',
        'religion',
        'birth_place',
        'address',
        'ward',
        'district',
        'city',
        'country',
        'class_id',
        'school_year',
        'status',
        'gpa',
        'father_name',
        'father_phone',
        'mother_name',
        'mother_phone',
        'guardian_name',
        'guardian_phone',
        'height',
        'weight',
        'blood_type',
        'medical_notes',
        'enrollment_date',
        'previous_school',
        'is_active',
        'profile_photo',
        'student_card_photo',
        'notes',
    ];

    /**
     * Casts cho các cột đặc biệt
     */
    protected $casts = [
        'date_of_birth' => 'date',
        'enrollment_date' => 'date',
        'gpa' => 'decimal:2',
        'height' => 'float',
        'weight' => 'float',
        'is_active' => 'boolean',
    ];

    /**
     * Liên kết 1-1 với User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Liên kết với lớp học (class)
     */
    public function class()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    /**
     * Accessor: trạng thái học sinh
     */
    public function getStatusLabelAttribute()
    {
        return match ($this->status) {
            'studying' => 'Đang học',
            'graduated' => 'Đã tốt nghiệp',
            'suspended' => 'Tạm nghỉ',
            'expelled' => 'Bị đuổi',
            default => 'Không xác định',
        };
    }

    /**
     * Accessor: tuổi học sinh
     */
    public function getAgeAttribute()
    {
        return $this->date_of_birth ? $this->date_of_birth->age : null;
    }

    /**
     * Accessor: tên đầy đủ từ user
     */
    public function getFullNameAttribute()
    {
        return $this->user ? $this->user->name : null;
    }

    // Mask phone number to show only the first 4 digits
    public function getMaskedPhoneAttribute()
    {
        return $this->phone ? substr($this->phone, 0, 4) . '***' : '';
    }
}
