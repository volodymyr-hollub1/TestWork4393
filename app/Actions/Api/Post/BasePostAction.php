<?php

namespace App\Actions\Api\Post;

use App\Models\Post\Post;
use App\Repositories\Post\PostRepository;

abstract class BasePostAction
{
    public function __construct(public PostRepository $postRepository, public Post $postModel)
    {
    }
}
