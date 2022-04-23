<?php

namespace App\Http\Controllers\Api\Post;

use App\Actions\Api\Post\StorePostAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Resources\Post\PostResource;
use Illuminate\Http\JsonResponse;

class StorePostController extends Controller
{
    public function __invoke(StorePostAction $storePostAction, StorePostRequest $storePostRequest): JsonResponse
    {
        return (new PostResource($storePostAction($storePostRequest->validated())))->response()->setStatusCode(201);
    }
}
