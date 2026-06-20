<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Build extends Model
{
    protected $fillable = ['user_id', 'name', 'total_price', 'total_wattage', 'is_complete'];
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function components(): BelongsToMany
    {
        return $this->belongsToMany(Component::class, 'build_components')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function buildComponents(): HasMany
    {
        return $this->hasMany(BuildComponent::class);
    }

    public function quotes(): HasMany
    {
        return $this->hasMany(Quote::class);
    }
}
