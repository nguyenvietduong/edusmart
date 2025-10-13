<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Location extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['code', 'name', 'type', 'parent_id'];

    // Define the relationship with users
    public function users()
    {
        return $this->belongsToMany(User::class, 'location_user');
    }

    // Define the relationship with child locations
    public function children(): HasMany
    {
        return $this->hasMany(Location::class, 'parent_id');
    }

    // Define the relationship with the parent location
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'parent_id');
    }

    // Get the full path of the location including parent names
    public function getFullPathAttribute(): string
    {
        $names = [$this->name];
        $parent = $this->parent;

        while ($parent) {
            $names[] = $parent->name;
            $parent = $parent->parent;
        }

        return implode(', ', $names);
    }
}
