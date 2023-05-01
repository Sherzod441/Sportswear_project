<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomePageController extends Controller
{
    public function home()
    {
        return view('client.home');
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
