<?php

namespace App\Actions\Api\Tag;

use Illuminate\Database\Eloquent\Model;

class StoreTagAction extends BaseTagAction
{
    public function __invoke(array $data): Model
    {
        return $this->tagModel->firstOrCreate(
            [
                'title' => $data['title']
            ],
            [
                'title' => $data['title']
            ]
        );
    }
}
