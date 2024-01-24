<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'title'];


    //warehouse
    public function product_warehouse()
    {
        return $this->hasMany(ProductWarehouse::class);
    }
    public function warehouses()
    {
        return $this->belongsToMany(Warehouse::class, 'product_warehouses');
    }


    //category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    //details
    public function product_details()
    {
        return $this->hasOne(ProductDetail::class);
    }

    //review
    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    //product_images
    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    //cart
    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_items')->withPivot('quantity');
    }

    //order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
