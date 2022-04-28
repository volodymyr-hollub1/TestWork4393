<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Tag;

use App\Actions\Api\Tag\StoreTagAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreTagRequest;
use App\Http\Resources\Tag\TagResource;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreTagController extends Controller
{
    public function __invoke(StoreTagAction $storeTagAction, StoreTagRequest $storeTagRequest): JsonResource
    {
        return new TagResource($storeTagAction($storeTagRequest->validated()));
    }
}
