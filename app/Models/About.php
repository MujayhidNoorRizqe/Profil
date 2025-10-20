<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','description',
        'image',          // legacy (fallback bg)
        'hero_image',     // NEW: foto di kiri judul
        'counter_bg',     // NEW: background counter
        'counter1_value',
        'counter1_label',
        'counter2_value',
        'counter2_label',
        'counter3_value',
        'counter3_label',
        'counter4_value',
        'counter4_label',
    ];
}
