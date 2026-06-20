<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['rule_name', 'category_a', 'spec_key_a', 'category_b', 'spec_key_b', 'operator', 'is_blocking', 'message'])]
class CompatibilityRule extends Model
{
    use HasFactory;
}
