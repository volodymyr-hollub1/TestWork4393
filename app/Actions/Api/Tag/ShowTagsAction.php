<?php

declare(strict_types=1);

namespace App\Actions\Api\Tag;

use Illuminate\Database\Eloquent\Collection;

class ShowTagsAction extends BaseTagAction
{
    public function __invoke(array $data): Collection
    {
        return $this->tagRepository->show($data);
    }
}
