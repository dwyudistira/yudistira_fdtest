<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Books;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class BooksTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_add_a_book()
    {
        Storage::fake('public');
        $user = User::factory()->create();

        $bookData = [
            'title' => 'Laravel Testing',
            'author' => 'Taylor Otwell',
            'description' => 'A complete guide to testing in Laravel.',
            'thumbnail' => UploadedFile::fake()->image('cover.jpg'),
            'rating' => 5,
        ];

        $response = $this
            ->actingAs($user)
            ->post('/books', $bookData);
        $response->assertRedirect();

        $this->assertDatabaseHas('books', [
            'title' => 'Laravel Testing',
            'author' => 'Taylor Otwell',
        ]);

        Storage::disk('public')->assertExists('thumbnails/' . $bookData['thumbnail']->hashName());
    }

    public function guest_cannot_add_a_book()
    {
        $response = $this->post('/books', [
            'title' => 'Unauthorized',
            'author' => 'Someone',
            'description' => 'No access',
            'thumbnail' => UploadedFile::fake()->image('cover.jpg'),
            'rating' => 3,
        ]);

        $response->assertRedirect('/login');
        $this->assertDatabaseMissing('books', [
            'title' => 'Unauthorized',
        ]);
    }
}
