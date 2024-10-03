<?php

// app/Http/Controllers/CartController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{

    // Display the orders (cart items)
    public function showCart(Request $request)
    {
        $cart = $request->session()->get('cart', []);

        return view('orders', compact('cart'));
    }
}

