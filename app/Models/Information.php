<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{

    protected $fillable=[
      'address','number_1','number_2','postal_code','email','name'
    ];


    public function products(){

        return $this->belongsToMany(Product::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }
}
