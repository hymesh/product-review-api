<?php

namespace App\Http\Controllers;

use App\Dtos\ListProductDto;
use App\Http\Requests\ListProductRequest;
use App\Services\ListProductService;
use Illuminate\Http\Request;

use App\Product;
use App\Review;

class ProductController extends Controller
{
    public function listProduct(ListProductRequest $request)
    {
        $dto = new ListProductDto($request);
        $service = new ListProductService($dto);

        $products = $service->getProducts();

        return $products->paginate($request->input('page_size', 15));
    }

    public function getProduct($productId)
    {
        //return $product;
    }

    public function createProduct(Request $request)
    {
        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    public function updateProduct(Request $request, $productId) {
        //$product->update($request->all());

        //return response()->json($product, 200);
    }

    public function deleteProduct(Product $productId)
    {
        //$product->delete();

        //return response()->json(null, 204);
    }

    public function listReview($productId)
    {
        //return $product->reviews()->get();
    }

    public function createReview(Request $request, $productId)
    {
//        $user = $request->user();
//
//        $review = new Review($request->all());
//        $review->user_id = $user->id;
//        $review->product_id = $product->id;
//        $review->save();
//
//        return response()->json($review, 201);
    }
}
