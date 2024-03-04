<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\UpdateRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            $categories = Category::orderBy('id')->get();

            return view('cabinet.category.index',
                compact('categories'));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

    }

    public function edit(Category $category)
    {
        return view('cabinet.category.edit', compact('category'));
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $success = $category->update($request->validated());

        if($success){
            session()->flash('success', __('other.Information has been successfully updated'));
        }

        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        $success = $category->delete();

        if($success){
            session()->flash('success', __('other.The record was successfully deleted'));
        }

        return redirect()->route('category.index');
    }

}
