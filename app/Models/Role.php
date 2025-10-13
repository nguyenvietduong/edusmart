<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'title', 'description'];

    /**
     * Define the relationship with the User model
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
