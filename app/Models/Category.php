<?php

namespace App\Models;

use App\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable= ['name','parent','product'];





    public function child()
    {
        return $this->hasMany(Category::class , 'parent' , 'id');
    }


    public function products()
    {
        return $this->belongsToMany(\App\Models\Product::class);
    }





}
