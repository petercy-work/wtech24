<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($categorySlug = null)
    {
        $category = null;

        if ($categorySlug) {
            $category = Category::where('slug', $categorySlug)->firstOrFail();

            $products = Product::whereHas('categories', function ($query) use ($category) {
                $query->where('id', $category->id);
            })->with(['images', 'categories'])->paginate(5); // this assumes that a product will belong to category and its subcategories
        } else {
            $products = Product::with(['images', 'categories'])->paginate(5);
        }

        return view(
            'product-page',
            [
                'products' => $products,
                'category' => $category,
                'subcategories' => $category ? $category->children : collect()
            ]
        );
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
    public function store(StoreProductRequest $request)
    {
        //
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
    public function update(UpdateProductRequest $request, Product $product)
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
}
