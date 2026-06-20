<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['component_id', 'spec_key', 'spec_value'])]
class ComponentSpec extends Model
{
    use HasFactory;

    public function component(): BelongsTo
    {
        return $this->belongsTo(Component::class);
    }
}
