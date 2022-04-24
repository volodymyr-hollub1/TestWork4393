<?php

namespace Tests\Feature;

use App\Models\Post\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestResponse;

class PostTest extends CoreTest
{
    use WithFaker;
    use RefreshDatabase;
    
    public function testCorrectPost(): void
    {
        $post = [
            'title' => $this->faker->text(60),
            'content' => $this->faker->text(),
            'slug' => $this->faker->slug(),
            'tags' => []
        ];

        $response = $this->postJson('/api/posts', $post, $this->getHeaders());
        $response->assertStatus(201);
    }

    public function testCorrectUpdate(): void
    {
        $this->testCorrectPost();

        $postId = Post::first()->id;

        $post = [
            'title' => $this->faker->text(60),
            'content' => $this->faker->text(),
            'slug' => $this->faker->slug(),
            'tags' => []
        ];

        $response = $this->putJson("/api/posts/{$postId}", $post, $this->getHeaders());
        $response->assertStatus(200);
    }

    public function testCorrectDelete(): void
    {
        $this->testCorrectPost();

        $postId = Post::first()->id;

        $response = $this->delete("/api/posts/{$postId}", headers: $this->getHeaders());
        $response->assertStatus(202);
    }

    public function testShowPosts(): void
    {
        $this->testCorrectPost();

        $response = $this->getJson('/api/posts', $this->getHeaders());
        $response->assertJsonCount(1, 'data');
    }

    public function testShowOneSinglePost(): void
    {
        $this->testCorrectPost();

        $postId = Post::first()->id;

        $response = $this->getJson("/api/posts/{$postId}", $this->getHeaders());

        $response->assertJsonStructure([
            'data' => [
                'id',
                'title',
                'content',
                'slug',
                'tags'
            ]
        ]);
    }

    public function testIncorrectPost(): void
    {
        $post = [
            'title' => $this->faker->text(60),
            'content' => $this->faker->text(),
            'slug' => $this->faker->slug(),
            'tags' => [
                9999999
            ]
        ];

        $response = $this->postJson('/api/posts', $post, $this->getHeaders());
        $response->assertStatus(422);
    }
}
