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
        $products = Product::paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'category' => 'required|in:Mouse,Keyboard,Headset,Monitor,Speaker',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'supplier_email' => 'required|email|unique:products,supplier_email',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Product::findOrFail($id);
        return view('products.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'category' => 'required|in:Mouse,Keyboard,Headset,Monitor,Speaker',
            'price' => 'required|min:0',
            'stock' => 'required|integer|min:0',
            'supplier_email' => 'required|email|unique:products,supplier_email',
        ]);

        $products = Product::findOrFail($id);
        $products->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Product::findOrFail($id);
        $products->delete();

        return redirect()->route('products.index')->with('success', 'Product has been deleted successfully!');
    }
}
