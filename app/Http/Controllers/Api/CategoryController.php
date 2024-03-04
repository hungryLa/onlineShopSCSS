<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Category\CategoryWithProductsResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        try {

            $categories = CategoryWithProductsResource::collection(
                Category::orderBy('id')->get()
            )->response()->getData();

            return response()->json([
                'categories' => $categories
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 500);
        }

    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $category = Category::create($data);

        return new CategoryResource($category);
    }

    public function show(Category $category)
    {
        return $category;
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();

        return $category->update($data);
    }

    public function destroy(Category $category)
    {
        return $category->delete();

    }

}