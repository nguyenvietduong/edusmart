<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'phone',
        'avatar',
        'gender',
        'birthdate',
        'points',
        'vip_level',
        'status',
        'is_online',
        'last_seen',
        'current_room',
        'role_id',
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
        'birthday' => 'date',
        'last_login_at' => 'datetime',
        'is_active' => 'boolean',
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

    // Accessor methods for masking sensitive information
    public function getMaskedEmailAttribute()
    {
        if (!$this->email) {
            return '';
        }

        $domain = Str::after($this->email, '@');
        return '***@' . $domain;
    }

    // Mask phone number to show only the first 4 digits
    public function getMaskedPhoneAttribute()
    {
        return $this->phone ? substr($this->phone, 0, 4) . '***' : '';
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
