<?php

namespace Tests\Feature;

use App\Models\File;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_file_store(): void
    {
        Storage::fake('avatars');

        $file = UploadedFile::fake()->image('frs.jpg');
        $file1 = UploadedFile::fake()->image('frs1.jpg');

        $response = $this->post('/api/files/store/product/2/images',[
            'files' => [$file,$file1],
        ]);


        $response->assertStatus(200);
    }

    public function test_file_delete()
    {
        $file = File::all()->first();
        $response = $this->delete("/api/files/{$file->id}/destroy");

        $response->assertStatus(200);
    }

//    public function test_file_downland()
//    {
//        $file = File::all()->random();
//        $response = $this->get("/api/files/$file->id/downland");
//
//        $response->assertOk();
//    }


}
