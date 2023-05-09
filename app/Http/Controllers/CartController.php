<?php

namespace App\Http\Controllers;

use App\Models\Order_items;
use App\Models\Orders;
use App\Models\Products;
use Carbon\Carbon;
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
                    'total_price' => $product->product_price * 1,
                    'product_id' => $productId,
                ]
            ];
        } else {
            // Если товар уже есть в корзине, увеличиваем количество
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] += 1;
                $cart[$productId]['total_price'] = $cart[$productId]['product_price'] * $cart[$productId]['quantity'];
            } else {
                // Если товара нет в корзине, добавляем его
                $cart[$productId] = [
                    'product_name' => $product->product_name,
                    'product_price' => $product->product_price,
                    'product_size' => $product->product_size,
                    'product_image' => $product->product_image,
                    'quantity' => 1,
                    'total_price' => $product->product_price * 1,
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
        if ($request->productId && $request->quantity) {
            $cart = session()->get('cart');
            if ($request->status === 'plus') {
                $cart[$request->productId]['quantity'] += 1;
                $cart[$request->productId]['total_price'] = $cart[$request->productId]['quantity'] * $cart[$request->productId]['product_price'];
                $message = true;
            }

            if ($request->status === 'minus') {
                if ($cart[$request->productId]['quantity'] === 1) {

                    $cart[$request->productId]['quantity'] = 1;
                    $cart[$request->productId]['total_price'] = $cart[$request->productId]['quantity'] * $cart[$request->productId]['product_price'];
                    $message = false;
                } else {

                    $cart[$request->productId]['quantity'] -= 1;
                    $cart[$request->productId]['total_price'] = $cart[$request->productId]['quantity'] * $cart[$request->productId]['product_price'];
                    $message = true;
                }
            }

            session()->put('cart', $cart);
            return response()->json([
                'cart' => session()->get('cart'),
                'message' => $message,
            ]);
        }
        // return redirect()->back()->with('succes', 'Updated successfully');
    }

    public function removeItem(Request $request)
    {
        if ($request->productId) {
            $cart = session()->get('cart');
            if ($cart[$request->productId]) {
                unset($cart[$request->productId]);
                session()->put('cart', $cart);
            }
        }
        return response()->json([
            'message' => true,
        ]);
    }

    // Order Items save
    public function order(Request $request)
    {
        $orders = Orders::query()->create([
            'order_date' => Carbon::now(),
            'customer_name' => $request->customer_name,
            'customer_number' => $request->customer_number,
            'total_amount' => $request->total_amount
        ]);

        $cart = session()->get('cart');
        foreach ($cart as $c) {
            Order_items::query()->create([
                'order_id' => $orders->id,
                'product_id' => $c['product_id'],
                'quantity' => $c['quantity'],
                'price' => $c['product_price'],
            ]);
        }

        session()->forget('cart');

        return response()->json([
            'message' => true,
        ]);
    }
}
