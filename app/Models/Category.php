<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'slug', 'icon', 'sort_order'])]
class Category extends Model
{
    use HasFactory;

    public function components(): HasMany
    {
        return $this->hasMany(Component::class);
    }
}
