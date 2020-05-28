<?php

namespace App\Http\Controllers;

use App\Product;
use App\Departament;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('departament:id,name', 'category:id,name')->get();
     
        return view('products.productIndex', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $departaments = Departament::pluck('name','id');

        return view('products.productForm', compact('departaments', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | max:20',
            'departament_id' => 'required',
            'category_id' => 'required',
            'description' => 'required | max:100',
            'amount' => 'required',
        ]);

        Product::create($request->all());

        return redirect()->route('product.index')->with('message', 'Product Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // Define
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $departaments = Departament::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');

        return view('products.productForm', compact('product', 'departaments', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required | max:20',
            'departament_id' => 'required',
            'category_id' => 'required',
            'description' => 'required | max:100',
            'amount' => 'required',
        ]);

        Product::where('id', $product->id)->update($request->except('_token', '_method'));
       
        return redirect()->route('product.index')->with('message', 'Category Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('message', 'Category Deleted');
    }
}
