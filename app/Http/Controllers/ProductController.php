<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Review;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    public function update(Request $request, Product $product) {
        $product->update($request->all());

        return response()->json($product, 200);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(null, 204);
    }

    public function showReviews(Product $product)
    {
        return $product->reviews()->get();
    }

    public function storeReview(Request $request, Product $product)
    {
        $user = $request->user();

        $review = new Review($request->all());
        $review->user_id = $user->id;
        $review->product_id = $product->id;
        $review->save();

        return response()->json($review, 201);
    }
}
