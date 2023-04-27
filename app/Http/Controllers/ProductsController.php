<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();
        return view('client.home', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Products();
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_size = $request->product_size;
        $product->product_type_id = $request->product_type;
        $product->product_image = $request->product_image;
        $product->save();

        return redirect()->route('client.home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Products::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        // return redirect()->route('client.home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Products::findOrFail($id);
        $product->delete();
    }
}
