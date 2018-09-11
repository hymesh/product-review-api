<?php

namespace App\Http\Controllers;

use App\Dtos\CreateProductDto;
use App\Dtos\ListProductDto;
use App\Dtos\UpdateProductDto;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\CreateReviewRequest;
use App\Http\Requests\ListProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product;
use App\Services\ProductCreator;
use App\Services\ProductModifier;
use App\Services\ProductRetriever;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function listProduct(ListProductRequest $request, ProductRetriever $retriever)
    {
        $dto = $request->getProductSearchParamDto();
        $products = $retriever->retrieveProduct($dto);

        return new JsonResponse($products);
    }

    public function getProduct($productId)
    {
        try {
            $product = Product::findOrFail($productId);
            return new JsonResponse($product);
        } catch (ModelNotFoundException $e) {
            return new JsonResponse(null, Response::HTTP_NOT_FOUND);
        }
    }

    public function createProduct(CreateProductRequest $request)
    {
        $dto = new CreateProductDto($request);
        $service = new ProductCreator($dto);

        $product = DB::transaction(function () use ($service) {
            $product = $service->createProduct();
            $product->save();

            return $product;
        });

        return new JsonResponse($product, Response::HTTP_CREATED);
    }

    public function updateProduct(UpdateProductRequest $request, $productId) {
        $dto = new UpdateProductDto($request, $productId);
        $service = new ProductModifier($dto);

        $product = DB::transaction(function () use ($service) {
            $product = $service->modifyProduct();

            if ($product !== null) {
                $product->save();
            }

            return $product;
        });

        if ($product === null) {
            return new JsonResponse(null, Response::HTTP_NOT_FOUND);
        } else {
            return new JsonResponse($product);
        }
    }

    public function deleteProduct($productId)
    {
        try {
            $product = Product::findOrFail($productId);
            $product->delete();

            return new JsonResponse(null, Response::HTTP_NO_CONTENT);
        } catch (ModelNotFoundException $e) {
            return new JsonResponse(null, Response::HTTP_NOT_FOUND);
        }
    }

    public function listReview(Request $request, $productId)
    {
        try {
            $product = Product::findOrFail($productId);

            $reviews = $product->reviews()->paginate($request->input('page_size', 15));

            return new JsonResponse($reviews);
        } catch (ModelNotFoundException $e) {
            return new JsonResponse(null, Response::HTTP_NOT_FOUND);
        }
    }

    public function createReview(CreateReviewRequest $request, $productId)
    {
        $user = $request->user();
        try {
            $product = Product::findOrFail($productId);

            $content = $request->input('content');
            $product->reviews()->create([
                'content' => $content,
                'user_id' => $user->id
            ]);

            return new JsonResponse(null, Response::HTTP_CREATED);
        } catch (ModelNotFoundException $e) {
            return new JsonResponse(null, Response::HTTP_NOT_FOUND);
        }
    }
}
