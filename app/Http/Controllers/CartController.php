<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart');
        // dd($cart);

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
                    'product_size' => $product->product_size,
                    'product_image' => $product->product_image,
                    'quantity' => 1,
                    'product_id' => $productId,
                ]
            ];
        } else {
            // Если товар уже есть в корзине, увеличиваем количество
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] += 1;
                $cart[$productId]['product_price'] *= $cart[$productId]['quantity'];
            } else {
                // Если товара нет в корзине, добавляем его
                $cart[$productId] = [
                    'product_name' => $product->product_name,
                    'product_price' => $product->product_price,
                    'product_size' => $product->product_size,
                    'product_image' => $product->product_image,
                    'quantity' => 1,
                    'product_id' => $productId,
                ];
            }
        }

        // Сохраняем обновленную корзину в сессии
        session()->put('cart', $cart);

        // Редиректим пользователя на страницу корзины
        return response()->json([
            'cart' => session()->get('cart'),
        ]);
    }
    public function cartUpdate(Request $request)
    {
        $message = true;
        if ($request->productId && $request->quantity) {
            $cart = session()->get('cart');
            if ($request->status === 'plus') {
                $cart[$request->productId]['quantity'] += 1;
            }

            if ($request->status === 'minus') {
                if ($cart[$request->productId]['quantity'] === 1) {

                    $cart[$request->productId]['quantity'] = 1;
                } else {

                    $cart[$request->productId]['quantity'] -= 1;
                }
            }

            session()->put('cart', $cart);
            return response()->json([
                'cart' => session()->get('cart'),
                'message' => true,
            ]);
        }
        // return redirect()->back()->with('succes', 'Updated successfully');
    }

    public function removeItem()
    {
    }
}
