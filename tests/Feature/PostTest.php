<?php

namespace Tests\Feature;

use App\Models\Post\Post;
use Illuminate\Database\Eloquent\Collection;

class PostTest extends CoreTest
{
    public function testCorrectPostCreating(): void
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
        $oldPost = $this->getPostObject(1);

        $post = [
            'title' => $this->faker->text(60),
            'content' => $this->faker->text(),
            'slug' => $this->faker->slug(),
            'tags' => []
        ];

        $response = $this->putJson("/api/posts/{$oldPost->id}", $post, $this->getHeaders());
        $response->assertStatus(200);
    }

    public function testCorrectDelete(): void
    {
        $post = $this->getPostObject(1);

        $response = $this->delete("/api/posts/{$post->id}", headers: $this->getHeaders());
        $response->assertStatus(202);
    }

    public function testShowPosts(): void
    {
        $this->getPostObject(100);

        $response = $this->getJson('/api/posts', $this->getHeaders());
        $response->assertStatus(200);
    }

    public function testShowOneSinglePost(): void
    {
        $post = $this->getPostObject(1);

        $response = $this->getJson("/api/posts/{$post->id}", $this->getHeaders());

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

    private function getPostObject(int $count): Post
    {
        $post = Post::factory($count)->create();
        return $post[0];
    }
}
