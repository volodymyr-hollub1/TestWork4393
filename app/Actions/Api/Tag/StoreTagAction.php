<?php

declare(strict_types=1);

namespace App\Actions\Api\Tag;

use Illuminate\Database\Eloquent\Model;

class StoreTagAction extends BaseTagAction
{
    public function __invoke(array $data): Model
    {
        return $this->tagRepository->store($data);
    }
}
