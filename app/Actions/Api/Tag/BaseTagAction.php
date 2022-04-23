<?php

namespace App\Actions\Api\Tag;

use App\Models\Tag\Tag;
use App\Repositories\Tag\TagRepository;

abstract class BaseTagAction
{
    public function __construct(public TagRepository $tagRepository, public Tag $tagModel)
    {
    }
}
