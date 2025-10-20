<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'about_text',
        'visi_title',
        'visi_text',
        'visi_image',
        'misi_title',
        'misi_text',
        'misi_image',
    ];
}
