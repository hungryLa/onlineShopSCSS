<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_product_index(): void
    {
        $response = $this->get('/api/products?title=a&categories[]=1&categories[]=4');

        $response->assertStatus(200);
    }

    public function test_product_store()
    {
        $response = $this->post('/api/products/store', [
            'title' => 'Test',
            'price' => 1900,
        ]);

        $this->assertDatabaseHas('products',[
            'title' => 'Test',
            'price' => 1900,
        ]);
    }

    public function test_product_get_one()
    {
        $product = Product::all()->random();
        $response = $this->get("/api/products/{$product->id}");

        $response = $response->assertJsonPath('data.title', $product->title);
        $response->assertOk();
    }

    public function test_product_update()
    {
        $product = Product::all()->random();

        $response = $this->patch("api/products/{$product->id}/update", [
            'title' => 'Test update',
            'price' => 2000,
        ]);

        $response->assertOk();

        $this->assertDatabaseHas('products', [
            'title' => 'Test update',
            'price' => 2000,
        ]);

    }

    public function test_product_delete()
    {
        $product = Product::all()->random();
        $product_id = $product->id;

        if (count($product->categories) != 0){
            $category_id = $product->categories()->first()->id;

        }


        $response = $this->delete("api/products/{$product->id}/delete");

        $response->assertOk();

        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
        if (count($product->categories) != 0){
            $this->assertDatabaseMissing('category_products', [
                'category_id' => $category_id,
                'product_id' => $product_id,
            ]);
        }
    }
}
