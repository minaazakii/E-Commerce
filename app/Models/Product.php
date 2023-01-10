<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [ 'name', 'description', 'color','size','image', 'price', 'discount_price', 'category_id'];
    protected $table = 'products';
    protected $casts = ['color' => 'array','size' => 'array'];


    public  function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

}
