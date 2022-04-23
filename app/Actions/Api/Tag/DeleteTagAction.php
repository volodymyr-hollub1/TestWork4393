<?php

namespace App\Actions\Api\Tag;

use Illuminate\Database\Eloquent\Collection;

class DeleteTagAction extends BaseTagAction
{
    public function __invoke(int $id): array
    {
        $tag = $this->tagRepository->showOneSingleTag($id);
        $tagTitle = $tag->title;

        $tag->posts()->detach();
        $tag->delete();

        return [
            'message' => "Tag {$tagTitle} deleted!"
        ];
    }
}
