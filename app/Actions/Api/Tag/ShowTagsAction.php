<?php

namespace App\Actions\Api\Tag;

use Illuminate\Database\Eloquent\Collection;

class ShowTagsAction extends BaseTagAction
{
    public function __invoke(array $data): Collection | null
    {
        return $this->tagRepository->showTags($data);
    }
}
