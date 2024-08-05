<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function totalQuantity(){
        return $this->stocks()->sum("quantity");
    }

    
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function reviewsAverage()
    {
        return $this->reviews()->average("rating");
    }
}
