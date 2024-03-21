<?php

namespace App\Http\Controllers\Api;

use App\Filters\ShopFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\StoreRequest;
use App\Http\Requests\Shop\UpdateRequest;
use App\Http\Resources\Shop\ShopResource;
use App\Models\Shop;


class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ShopFilter $request)
    {
        return ShopResource::collection(
            Shop::filter($request)->with('products')->get()
        )->response()->getData(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            return Shop::create($request->validated());

        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function getOne(Shop $shop)
    {
        try {

            return new ShopResource($shop);

        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Shop $shop)
    {
        try {
            return $shop->update($request->validated());
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        try {
            return $shop->delete();

        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 400);
        }
    }
}
