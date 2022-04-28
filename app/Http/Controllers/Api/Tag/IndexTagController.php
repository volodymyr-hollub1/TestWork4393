<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Tag;

use App\Actions\Api\Tag\ShowTagsAction;
use App\Http\Requests\Filter\FilterRequest;
use App\Http\Resources\Tag\TagResource;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexTagController
{
    public function __invoke(ShowTagsAction $showTagsAction, FilterRequest $filterRequest): JsonResource
    {
        return TagResource::collection($showTagsAction($filterRequest->validated()));
    }
}
