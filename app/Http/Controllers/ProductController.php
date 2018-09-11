<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\CreateReviewRequest;
use App\Http\Requests\ListProductRequest;
use App\Http\Requests\ListReviewRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\ProductCreator;
use App\Services\ProductModifier;
use App\Services\ProductRetriever;
use App\Services\ReviewCreator;
use App\Services\ReviewRetriever;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function listProduct(ListProductRequest $request, ProductRetriever $retriever)
    {
        $dto = $request->getProductSearchParamDto();
        $products = $retriever->retrieveProducts($dto);

        return new JsonResponse($products);
    }

    public function getProduct(ProductRetriever $retriever, int $productId)
    {
        $product = $retriever->retrieveById($productId);

        return new JsonResponse($product);
    }

    public function createProduct(CreateProductRequest $request, ProductCreator $creator)
    {
        $dto = $request->getProductCreateParamDto();
        $product = $creator->createProduct($dto);
        $product->save();

        return new JsonResponse($product, Response::HTTP_CREATED);
    }

    public function updateProduct(UpdateProductRequest $request, ProductRetriever $retriever, ProductModifier $modifier, int $productId) {
        $dto = $request->getProductUpdateParamDto();
        $product = $retriever->retrieveById($productId);

        $product = DB::transaction(function () use ($modifier, $product, $dto) {
            $product = $modifier->modifyProduct($product, $dto);
            $product->save();

            return $product;
        });

        return new JsonResponse($product);
    }

    public function deleteProduct(ProductRetriever $retriever, int $productId)
    {
        $product = $retriever->retrieveById($productId);
        $product->delete();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }

    public function listReview(ListReviewRequest $request, ProductRetriever $productRetriever, ReviewRetriever $reviewRetriever, int $productId)
    {
        $dto = $request->getReviewListDto();
        $product = $productRetriever->retrieveById($productId);
        $reviews = $reviewRetriever->retrieveReviews($product, $dto);

        return new JsonResponse($reviews);
    }

    public function createReview(CreateReviewRequest $request, ProductRetriever $retriever, ReviewCreator $creator, $productId)
    {
        $user = $request->user();
        $content = $request->input('content');

        DB::beginTransaction();

        $product = $retriever->retrieveById($productId);

        $review = $creator->createReview($content);

        $review->user()->associate($user);
        $review->product()->associate($product);

        $review->save();

        DB::commit();

        return new JsonResponse(null, Response::HTTP_CREATED);
    }
}
