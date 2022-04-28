<?php

declare(strict_types=1);

namespace App\Actions\Api\Post;

use Illuminate\Database\Eloquent\Model;

class UpdatePostAction extends BasePostAction
{
    public function __invoke(array $data, int $id): Model
    {
        return $this->postRepository->update($data, $id);
    }
}
