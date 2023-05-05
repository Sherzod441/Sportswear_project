<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart');

        if (!$cart) {
            return view('client.card_show');
        }

        return view('client.card_show')->with('cart', $cart);
    }

    public function add(Request $request)
    {
        // Получаем данные о товаре
        $productId = $request->input('product_id');
        $product = Products::find($productId);
        
        // Получаем текущую корзину из сессии
        $cart = session()->get('cart');
        
        // Если корзина пуста, создаем новый массив
        if (!$cart) {
            $cart = [
                $productId => [
                    'product_name' => $product->product_name,
                    'product_price' => $product->product_price,
                    'product_type_id' => $product->product_type_id,
                    'product_size' => $product->pruduct_size,
                    'product_image' => $product->product_image,
                    'quantity' => 1
                ]
            ];
        } else {
            // Если товар уже есть в корзине, увеличиваем количество
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity']+=1;
            } else {
                // Если товара нет в корзине, добавляем его
                $cart[$productId] = [
                    'product_name' => $product->product_name,
                    'product_price' => $product->product_price,
                    'product_type_id' => $product->product_type_id,
                    'product_size' => $product->pruduct_size,
                    'product_image' => $product->product_image,
                    'quantity' => 1
                ];
            }
        }
        
        // Сохраняем обновленную корзину в сессии
        session()->put('cart', $cart);
        
        // Редиректим пользователя на страницу корзины
        return redirect()->route('cart');
    }
}
