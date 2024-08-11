<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        "name",
        "img",
        "vendor_id",
        "short_description",
        "long_description"
    ];

    public function scopeVendorProducts($query)
    {
        $vendor = Auth::guard("vendor")->user();
        return $query->where("vendor_id", $vendor->id);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
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
