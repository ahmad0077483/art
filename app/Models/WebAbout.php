<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebAbout extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'short_dis',
        'long_dis'
    ];
}
