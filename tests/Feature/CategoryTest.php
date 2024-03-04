<?php

namespace Tests\Feature;

use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use App\Models\User;
use http\Env\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_category_index(): void
    {
        $categories = Category::factory(20)->create();
        $response = $this->get('/api/categories');

        $response->assertOk();

    }

    public function test_category_store()
    {
        $response = $this->post('/api/categories/store',[
            'type' => Category::TYPES['clothes'],
            'title' => 'Test',
        ]);

        $response->assertJsonPath('data.title', 'Test');

        $this->assertDatabaseHas('categories', [
            'title' => 'Test',
        ]);

    }

    public function test_category_show()
    {

        $user = User::find(1);

        $response = $this
            ->actingAs($user)
            ->get('/api/categories/1');

        $response->assertOk();
    }

    public function test_category_update()
    {
        $category = Category::find(1);

        $response = $this->patch("/api/categories/$category->id/update", [
            'type' => Category::TYPES['clothes'],
            'title' => 'Change title',
        ]);

        $response = $this->get("api/categories/$category->id");

        $response->assertJsonPath('title', 'Change title');
    }

    public function test_category_delete()
    {
        $category = Category::find(2);

        $response = $this->delete("/api/categories/$category->id/delete");

        $this->assertDatabaseMissing('categories', [
            'id' => 2,
        ]);
    }


}
