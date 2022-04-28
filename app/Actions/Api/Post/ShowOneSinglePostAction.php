<?php

declare(strict_types=1);

namespace App\Actions\Api\Post;

use Illuminate\Database\Eloquent\Model;

class ShowOneSinglePostAction extends BasePostAction
{
    public function __invoke(int $id): Model
    {
        return $this->postRepository->showOne($id);
    }
}
