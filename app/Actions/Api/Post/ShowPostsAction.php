<?php

declare(strict_types=1);

namespace App\Actions\Api\Post;

use Illuminate\Pagination\LengthAwarePaginator;

class ShowPostsAction extends BasePostAction
{
    public function __invoke(array $data): mixed
    {
        return $this->postRepository->show($data);
    }
}
