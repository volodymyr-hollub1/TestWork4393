<?php

namespace Tests\Feature;

use App\Models\Tag\Tag;
use Illuminate\Database\Eloquent\Collection;

class TagTest extends CoreTest
{
    public function testShowTags(): void
    {
        $this->getTagObject(20);

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
        $tag = $this->getTagObject(1)[0];
        $response = $this->delete("/api/tags/{$tag->id}", headers: $this->getHeaders());

        $response->assertStatus(202);
    }

    private function getTagObject(int $count): Collection
    {
        $tag = Tag::factory($count)->create();
        return $tag;
    }
}
