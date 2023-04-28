<?php

namespace App\Http\Controllers;

use App\Models\Product_types;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product_types = Product_types::all();
        
        return view('admin.product_type', compact('product_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product_types = Product_types::all();
        return view('admin.product_type_create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $product_type = new Product_types();

       $product_type->type_name = $request->product_type_name;
       $product_type->save();
       return redirect()->back()->with('success', 'Data Successfully saved.');
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
        return view('admin.product_type_create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product_type = Product_types::findOrFail($id);

        $product_type = $request->product_type_name;
        $product_type->save();
        return redirect()->back()->with('success', 'Data Successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product_type = Product_types::findOrFail($id);

        $product_type->delete();
        return redirect()->back()->with('success', 'Data Successfully deleted.');
    }
}
