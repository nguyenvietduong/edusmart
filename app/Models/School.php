<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    use HasFactory;

    /**
     * Các cột cho phép gán hàng loạt.
     */
    protected $fillable = [
        'name',
        'level',
        'type',
        'email',
        'phone',
        'logo',
        'description',
        'address',
        'ward',
        'district',
        'city',
        'country',
        'founded_at',
        'total_students',
        'total_teachers',
    ];

    /**
     * 🔗 Một trường có nhiều khối lớp (class).
     */
    public function classes()
    {
        return $this->hasMany(ClassModel::class);
    }

    /**
     * 🔗 Một trường có nhiều giáo viên.
     */
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    /**
     * 🔗 Một trường có thể có nhiều năm học (school years).
     */
    public function schoolYears()
    {
        return $this->hasMany(SchoolYear::class);
    }

    /**
     * 🏙️ Helper: trả về địa chỉ đầy đủ.
     */
    public function getFullAddressAttribute(): string
    {
        $parts = array_filter([$this->address, $this->ward, $this->district, $this->city]);
        return implode(', ', $parts);
    }

    /**
     * 🏫 Helper: trả về logo hiển thị hoặc ảnh mặc định.
     */
    public function getLogoUrlAttribute(): string
    {
        return $this->logo
            ? asset($this->logo)
            : asset('images/default-school.png');
    }
}
