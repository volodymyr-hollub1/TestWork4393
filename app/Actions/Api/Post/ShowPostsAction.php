<?php

namespace App\Actions\Api\Post;

use App\Http\Requests\Filter\FilterRequest;
use Illuminate\Pagination\LengthAwarePaginator;

class ShowPostsAction extends BasePostAction
{
    public function __invoke(array $filterData): LengthAwarePaginator
    {
        return $this->postRepository->showPosts($filterData);
    }
}
