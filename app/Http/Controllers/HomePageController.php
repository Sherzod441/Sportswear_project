<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomePageController extends Controller
{
    public function home()
    {
        $products = Products::all();
        // dd($products);
        return view('client.home', [
            'products' => $products,
        ]);
    }


    // order items
    public function orderItem()
    {
        return view('client.order_item');
    }

    // lang method
    public function lang(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('lang', $request->lang);

        // dd($request->lang);
        return redirect()->back();
    }
}
