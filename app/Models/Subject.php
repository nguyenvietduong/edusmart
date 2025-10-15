<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['subject_code', 'name', 'slug', 'short_name', 'category', 'credit', 'lesson_hours', 'weekly_hours', 'semester', 'teacher_id', 'default_room', 'description', 'is_elective', 'is_active', 'cover_image', 'syllabus_file'];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_subject_class')
            ->withPivot('class_id', 'semester')
            ->withTimestamps();
    }

    public function classes()
    {
        return $this->belongsToMany(ClassModel::class, 'teacher_subject_class')
            ->withPivot('teacher_id', 'semester')
            ->withTimestamps();
    }
}
