<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Post;

use App\Actions\Api\Post\ShowPostsAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Filter\FilterRequest;
use App\Http\Resources\Post\PostResource;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexPostController extends Controller
{
    public function __invoke(ShowPostsAction $showPostsAction, FilterRequest $filterRequest): JsonResource
    {
        return PostResource::collection($showPostsAction($filterRequest->validated()));
    }
}
