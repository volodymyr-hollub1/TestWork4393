<?php

declare(strict_types=1);

namespace App\Actions\Api\Post;

use App\Repositories\Post\PostRepository;

abstract class BasePostAction
{
    public function __construct(public PostRepository $postRepository)
    {
    }
}
