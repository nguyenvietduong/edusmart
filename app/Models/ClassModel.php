<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = 'classes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['class_code', 'name', 'slug', 'photo', 'school_year_id', 'grade_level', 'start_year', 'end_year', 'start_date', 'end_date', 'total_students', 'study_shift', 'room_name', 'homeroom_teacher_id', 'description', 'is_active'];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_subject_class')
            ->withPivot('subject_id', 'semester')
            ->withTimestamps();
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_subject_class')
            ->withPivot('teacher_id', 'semester')
            ->withTimestamps();
    }

    public function homeroomTeacher()
    {
        return $this->belongsTo(Teacher::class, 'homeroom_teacher_id');
    }
}
