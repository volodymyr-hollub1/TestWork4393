<?php

declare(strict_types=1);

namespace App\Actions\Api\Post;

use Illuminate\Database\Eloquent\Model;

class StorePostAction extends BasePostAction
{
    public function __invoke(array $data): Model
    {
        return $this->postRepository->store($data);
    }
}
