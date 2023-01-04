<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [ 'user_id', 'status', 'payment_method', 'payment_status', 'payment_id', 'total_price', 'address', 'phone', 'email', 'surname', 'city', 'postal_code', 'country', 'shipping_price',];

    public function order()
    {
        return $this->belongsTo(User::class);
    }
}
