<?php

namespace App\Http\Controllers\Api\Post;

use App\Actions\Api\Post\ShowOneSinglePostAction;
use App\Http\Resources\Post\PostResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowPostController
{
    public function __invoke(ShowOneSinglePostAction $showOneSinglePostAction, $id): JsonResource
    {
        return new PostResource($showOneSinglePostAction((int) $id));
    }
}
