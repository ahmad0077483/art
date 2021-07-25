<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $fillable=[
        'email',
        'number_1',
        'number_2',
        'number_3',
        'address'
    ];
}
