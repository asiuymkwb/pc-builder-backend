<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Component extends Model
{
    protected $fillable = [
        'category_id', 'name', 'brand', 'model',
        'price', 'wattage', 'image_url', 'buy_url', 'stock', 'is_active',
    ];
    use HasFactory;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function specs(): HasMany
    {
        return $this->hasMany(ComponentSpec::class);
    }

    public function buildComponents(): HasMany
    {
        return $this->hasMany(BuildComponent::class);
    }

    public function spec(string $key): ?string
    {
        return $this->specs->firstWhere('spec_key', $key)?->spec_value;
    }
}
