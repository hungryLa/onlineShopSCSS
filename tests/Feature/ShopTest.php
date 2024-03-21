<?php

namespace Tests\Feature;

use App\Models\Shop;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShopTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_shop_index(): void
    {
        $response = $this->get('/api/shops?title=et');

        $response->assertStatus(200);
    }

    public function test_shop_store(): void
    {
        $response = $this->post('/api/shops/store', [
            'title' => 'Test',
            'description' => 'Description',
        ]);

        $this->assertDatabaseHas('shops',[
            'title' => 'Test',
            'description' => 'Description',
        ]);
    }

    public function test_shop_getOne()
    {
        $shop = Shop::inRandomOrder()->limit(1)->first();
        $response = $this->get("/api/shops/$shop->id");

        $response = $response->assertJsonPath('data.title', $shop->title);
        $response->assertOk();
    }

    public function test_shop_update()
    {
        $shop = Shop::all()->random();

        $response = $this->patch("/api/shops/$shop->id/update", [
            'title' => "test".$shop->id,
            'description' => 'test',
        ]);

        $this->assertDatabaseHas('shops', [
            'title' => "test".$shop->id,
            'description' => 'test',
        ]);

        $response->assertOk();
    }

    public function test_shop_destroy()
    {
        $shop = Shop::all()->random();

        $response = $this->delete("/api/shops/$shop->id/delete");

        $this->assertDatabaseMissing('shops', [
            'id' => $shop->id,
        ]);

        $response->assertOk();

    }
}
