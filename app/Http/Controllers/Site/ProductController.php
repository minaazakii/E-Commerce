<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->limit(8)->get();
        $user = User::first();
        Auth::setUser($user);
        foreach($products as $product) 
        {
        Cart::session($user->id)->add(
            [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 4,
                'attributes' => array(),
                'associatedModel' => $product
            ]
        );
        }
        dd(Cart::getContent());
        return view('site.products.index',
        [
            'products' =>$products
        ]);
    }
}
