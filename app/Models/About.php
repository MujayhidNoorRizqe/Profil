<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
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
