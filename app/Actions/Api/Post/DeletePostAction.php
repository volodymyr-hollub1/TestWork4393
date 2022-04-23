<?php

namespace App\Actions\Api\Post;

class DeletePostAction extends BasePostAction
{
    public function __invoke($id): array
    {
        $post = $this->postRepository->showOneSinglePost($id);
        $postId = $post->id;
        
        $post->tags()->detach();
        $post->delete();
        
        return [
            'message' => "Post #{$postId} deleted"
        ];
    }
}
