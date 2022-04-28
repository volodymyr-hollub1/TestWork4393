<?php

declare(strict_types=1);

namespace App\Actions\Api\Tag;

class DeleteTagAction extends BaseTagAction
{
    public function __invoke(int $id): array
    {
        return $this->tagRepository->delete($id);
    }
}
