<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['build_id', 'user_id', 'generated_at'])]
class Quote extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'generated_at' => 'datetime',
        ];
    }

    public function build(): BelongsTo
    {
        return $this->belongsTo(Build::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
