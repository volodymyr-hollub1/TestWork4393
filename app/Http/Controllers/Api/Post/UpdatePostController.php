<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Post;

use App\Actions\Api\Post\UpdatePostAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Resources\Post\PostResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UpdatePostController extends Controller
{
    public function __invoke(
        UpdatePostAction $updatePostAction,
        UpdatePostRequest $updatePostRequest,
        int $id
    ): JsonResource {
        return new PostResource($updatePostAction($updatePostRequest->validated(), $id));
    }
}
