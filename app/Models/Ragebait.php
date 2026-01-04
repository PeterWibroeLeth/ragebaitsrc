<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ragebait extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'frame',
        'tier',
        'tier_tier',
        'description',
    ];
}
