<?php

namespace Tests\Feature;

use App\Models\Tag\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagTest extends CoreTest
{
    public function testShowTags(): void
    {
        $response = $this->getJson('/api/tags', $this->getHeaders());
        $response->assertJsonStructure(['data' => []]);
    }
    
    public function testCreateTag(): void
    {
        $tag = [
            'title' => $this->faker->word()
        ];
        $response = $this->postJson('/api/tags', $tag, $this->getHeaders());
        $response->assertJsonStructure(['data' => ['id', 'title']]);
    }
    
    public function testDeleteTag(): void
    {
        $this->testCreateTag();
        $tagId = Tag::first()->id;
        $response = $this->delete("/api/tags/{$tagId}", headers: $this->getHeaders());
        $response->assertStatus(202);
    }
}
