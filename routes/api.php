<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Api\ShopController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'users'],function (){

});

Route::group(['prefix' => 'categories'],function () {

    Route::get('', [CategoryController::class,'index'])
        ->name('category.index');

    Route::post('store', [CategoryController::class,'store'])
        ->name('category.store');

    Route::get('{category}', [CategoryController::class,'show'])
        ->name('category.show');

    Route::patch('{category}/update', [CategoryController::class,'update'])
        ->name('category.update');

    Route::delete('{category}/delete', [CategoryController::class, 'destroy'])
        ->name('category.destroy');
});

Route::group(['prefix' => 'shops'], function (){

    Route::get('',[ShopController::class, 'index'])
        ->name('shop.index');

    Route::post('store',[ShopController::class, 'store'])
        ->name('shop.store');

    Route::get('{shop}',[ShopController::class, 'getOne'])
        ->name('shop.getOne');

    Route::patch('{shop}/update',[ShopController::class,'update'])
        ->name('shop.update');

    Route::delete('{shop}/delete', [ShopController::class, 'destroy'])
        ->name('shop.delete');

});

Route::group(['prefix' => 'products'], function (){

    Route::get('',[ProductController::class, 'index'])
        ->name('product.index');

    Route::get('getProductForSlider',[ProductController::class, 'getProductForSlider'])
        ->name('product.getProductForSlider');

    Route::get('create',[ProductController::class, 'create'])
        ->name('product.create');

    Route::post('store',[ProductController::class, 'store'])
        ->name('product.store');

    Route::get('{slug}',[ProductController::class, 'getOne'])
        ->name('product.getOne');

    Route::get('{product}/edit',[ProductController::class,'edit'])
        ->name('product.edit');

    Route::patch('{product}/update',[ProductController::class,'update'])
        ->name('product.update');

    Route::delete('{product}/delete', [ProductController::class, 'destroy'])
        ->name('product.delete');

});

Route::group(['prefix' => 'files'],function (){

    Route::post('store/{modelType}/{modelId}/{fileType}', [FileController::class,'storeFiles'])
        ->name('file.storeFiles');

    Route::get('{file}/downland', [FileController::class,'downlandFile'])
        ->name('file.downland');

    Route::delete('{file}/destroy', [FileController::class,'delete'])
        ->name('file.delete');
});
