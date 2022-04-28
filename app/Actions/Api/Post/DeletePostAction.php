<?php

declare(strict_types=1);

namespace App\Actions\Api\Post;

class DeletePostAction extends BasePostAction
{
    public function __invoke(int $id): array
    {
        return $this->postRepository->delete($id);
    }
}
