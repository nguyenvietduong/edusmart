<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationUser extends Model
{
    // Chỉ định bảng không chuẩn RESTful
    // Vì bảng này không tuân theo quy tắc đặt tên chuẩn của Laravel
    protected $table = 'location_user'; // tên không chuẩn RESTful nên cần chỉ định

    // Các thuộc tính có thể gán hàng loạt
    // Chỉ định các trường có thể gán hàng loạt
    protected $fillable = [
        'user_id',
        'location_id',
        'name',
        'phone',
        'email',
        'street',
        'is_default'
    ];

    // Quan hệ đến User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Quan hệ đến Location
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}