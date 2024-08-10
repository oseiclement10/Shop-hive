<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Product extends Model
{
    use HasFactory;

    public function scopeVendorProducts($query)
    {
        $vendor = Auth::guard("vendor")->user();
        return $query->where("vendor_id", $vendor->id);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function stock()
    {
        return $this->hasOne(Stock::class);
    }

    

    public function totalQuantity()
    {
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
