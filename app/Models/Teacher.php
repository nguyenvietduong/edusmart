<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    /**
     * Các cột có thể mass assign
     */
    protected $fillable = [
        'user_id',
        'teacher_code',
        'gender',
        'birth_date',
        'citizen_id',
        'photo',
        'specialization',
        'qualification',
        'position',
        'phone',
        'email',
        'address',
        'hire_date',
        'resign_date',
        'is_active',
        'notes',
    ];

    /**
     * Casts cho các cột đặc biệt
     */
    protected $casts = [
        'birth_date' => 'date',
        'hire_date' => 'date',
        'resign_date' => 'date',
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
     * Accessor: hiển thị trạng thái công tác
     */
    public function getStatusAttribute()
    {
        return $this->is_active ? 'Đang công tác' : 'Đã nghỉ việc';
    }

    /**
     * Accessor: hiển thị tuổi
     */
    public function getAgeAttribute()
    {
        return $this->birth_date ? $this->birth_date->age : null;
    }

    /**
     * Accessor: hiển thị tên đầy đủ từ user
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
