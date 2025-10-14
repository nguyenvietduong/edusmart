<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Traits\HasUserType;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUserType;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'role_id',
        'card_uid',
        'face_id',
        'user_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the role that owns the user.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the locations associated with the user.
     */

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'location_user');
    }

    /**
     * Get the student associated with the user.
     */

    public function student()
    {
        return $this->hasOne(Student::class, 'user_id');
    }

    /**
     * Get the teacher associated with the user.
     */

    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'user_id');
    }

    // Accessor để tự động lấy profile dựa trên role
    public function getProfileAttribute()
    {
        return match ($this->user_type) {
            'student' => $this->student,
            'teacher' => $this->teacher,
            'admin' => $this->teacher,
            default => null
        };
    }

    // Accessor methods for masking sensitive information
    public function getMaskedEmailAttribute()
    {
        if (!$this->email) {
            return '';
        }

        $domain = Str::after($this->email, '@');
        return '***@' . $domain;
    }

    // Mask address to show only the first 30 characters
    public function getMaskedAddressAttribute()
    {
        return $this->full_address ? Str::limit($this->full_address, 30, '...') : '-';
    }

    // Accessor methods for formatted attributes
    public function getGenderAttribute()
    {
        return match ($this->attributes['gender'] ?? null) {
            'male'   => 'Nam',
            'female' => 'Nữ',
            'other'  => 'Khác',
            default  => null,
        };
    }

    // Accessor for formatted birthday
    public function getBirthdayAttribute()
    {
        try {
            return $this->attributes['birthday']
                ? Carbon::parse($this->attributes['birthday'])->format('d/m/Y')
                : null;
        } catch (\Exception $e) {
            return null; // Trả về null nếu định dạng sai hoặc không parse được
        }
    }

    // Accessor for full address
    public function getFullAddressAttribute()
    {
        $parts = [];

        if ($this->address_detail) {
            $parts[] = $this->address_detail;
        }

        $maxDepth = 10;

        foreach ($this->locations as $loc) {
            $locationParts = [];
            $current = $loc;
            $depth = 0;

            while ($current && $depth < $maxDepth) {
                $locationParts[] = $current->name;
                $current = $current->parent;
                $depth++;
            }

            $parts[] = implode(' > ', array_reverse($locationParts));
        }

        return implode('; ', $parts);
    }
}
