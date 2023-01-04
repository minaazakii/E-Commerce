<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'image', 'price', 'dsicount_price', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productColorSize()
    {
        return $this->hasMany(ProductColorSize::class);
    }

    public function productColor()
    {
        return $this->hasMany(ProductColor::class);
    }

    public function productSize()
    {
        return $this->hasMany(ProductSize::class);
    }


}
