<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages/product/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName, 'public');
        $product = new product;
        $product->title = $request->get('title');
        $product->image_path = $filePath;
        $product->price = $request->get('price');
        $product->description = $request->get('description');
        $product->save();
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
    /**
     * Достаем все созданные продукты
     */
    public function products(){
        Product::all();
    }
}
