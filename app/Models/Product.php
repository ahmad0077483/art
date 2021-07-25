<?php

namespace App\Models;

use AliBayat\LaravelLikeable\Likeable;
use Elasticsearch\Namespaces\BooleanRequestWrapper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Likeable;
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'inventory',
        'price',
        'view_count',
        'category',
        'image',
    ];



    public function comments(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Comment::class,'commentable');
    }

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }


    public function Orders(){

        return $this->belongsToMany(Order::class);
    }



    public function gallery(){

        return $this->hasMany(ProductGallery::class);
    }
    public function scopeFilter($query)
    {
        $category = request('category');
        if( isset($category) && trim($category) != '' && $category != 'all') {
            $query->whereHas('categories' , function ($query) use ($category) {
                $query->whereId($category);
            });
        }

        $type = request('type');
        if(isset($type) && trim($type) != '') {
            if(in_array($type , ['vip' , 'cash' , 'free'])) {
                $query->whereType($type);
            }
        }


        if(request('order') == '1') {
            $query->oldest();
        } else {
            $query->latest();
        }

        return $query;
    }


}
