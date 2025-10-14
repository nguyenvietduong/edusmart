<?php

namespace App\Traits;

trait HasUserType
{
    public static function getUserTypes(): array
    {
        return [
            'student' => 'Học sinh',
            'teacher' => 'Giáo viên',
            'staff'   => 'Nhân viên / Cán bộ',
            'parent'  => 'Phụ huynh',
            'admin'   => 'Quản trị viên',
        ];
    }

    public function getUserTypeLabelAttribute()
    {
        return self::getUserTypes()[$this->user_type] ?? ucfirst($this->user_type);
    }
}