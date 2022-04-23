<?php

namespace App\Actions\Api\Post;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class StorePostAction extends BasePostAction
{
    public function __invoke(array $data): Model
    {
        $post = $this->postModel->firstOrCreate(
            [
                'title' => $data['title']
            ],
            [
                'title' => $data['title'],
                'content' => $data['content'],
                'slug' => $data['slug']
            ]
        );
        
        $post->tags()->attach($data['tags']);
        
        return $post->fresh('tags');
    }
}
