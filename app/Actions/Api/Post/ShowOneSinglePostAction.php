<?php

namespace App\Actions\Api\Post;

use Illuminate\Database\Eloquent\Model;

class ShowOneSinglePostAction extends BasePostAction
{
    public function __invoke(int $id): Model | null
    {
        return $this->postRepository->showOneSinglePost($id);
    }
}
