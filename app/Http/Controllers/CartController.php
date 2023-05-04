<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show()
    {
        $cartItems = session('cart', []);
        return view('cart.show', compact('cartItems'));
    }

    public function add($id)
    {
        $cartItems = session('cart', []);
        $cartItems[$id] = isset($cartItems[$id]) ? $cartItems[$id] + 1 : 1;
        session(['cart' => $cartItems]);
        return back();
    }

    public function remove($id)
    {
        $cartItems = session('cart', []);
        if (isset($cartItems[$id])) {
            unset($cartItems[$id]);
            session(['cart' => $cartItems]);
        }
        return back();
    }
}
