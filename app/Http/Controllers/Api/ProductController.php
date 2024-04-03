<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use App\Models\Slug;
use Illuminate\Http\Request;
use App\Filters\ProductFilter;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductFilter $request)
    {

        $products = ProductResource::collection(
            Product::filter($request)->get()
        )->response()->getData(true);

        return $products;
    }

    public function getProductForSlider()
    {
        $products = ProductResource::collection(
            Product::with('images')->inRandomOrder()->take(27)->get()
        )->response()->getData(true);

        return $products;
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
    public function store(StoreRequest $request)
    {
        try {
            $data = $request->validated();

            return Product::create($data);

        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function getOne(string $slug)
    {
        $slug = Slug::where('key', $slug)->first();

        return new ProductResource($slug->reference);
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
    public function update(UpdateRequest $request, Product $product)
    {
        try {
            return $product->update($request->validated());

        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            if(count($product->categories) != 0){
                $product->categories()->detach();
            }

            return $product->delete();
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 500);
        }
    }
}
