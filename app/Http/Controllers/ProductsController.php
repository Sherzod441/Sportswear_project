<?php

namespace App\Http\Controllers;

use App\Models\Product_types;
use App\Models\Products;
use App\Services\ImageService;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $imageService;
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $products = Products::all();
        return view('admin.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product_type = Product_types::all();
        return view('admin.product_create', ['product_types' => $product_type]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $url = "";
        if ($request->hasFile('product_image')) {
            $url = $this->imageService->fileUpload($request->file('product_image'));
        }
        Products::query()->create([
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_size' => $request->product_size,
            'product_type_id' => $request->product_type_id,
            'product_image' => $url,
        ]);
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
        return view('admin.product_create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Products::findOrFail($id);
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_size = $request->product_size;
        $product->product_type_id = $request->product_type;
        $product->product_image = $request->product_image;
        $product->save();
        return redirect()->back()->with('success', 'Data Updated saved.');

        // return redirect()->route('client.home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Products::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success', 'Data delete saved.');
    }
}
