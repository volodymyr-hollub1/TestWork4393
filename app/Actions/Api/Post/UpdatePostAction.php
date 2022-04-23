<?php

namespace App\Actions\Api\Post;

use Illuminate\Database\Eloquent\Model;

class UpdatePostAction extends BasePostAction
{
    public function __invoke(array $data, $id): Model
    {
        $post = $this->postRepository->showOneSinglePost($id);
        
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update(array_filter($data));

        $post->tags()->sync($tags);

        return $post->fresh('tags');
    }
}
