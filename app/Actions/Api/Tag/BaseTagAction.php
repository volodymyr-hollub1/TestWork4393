<?php

declare(strict_types=1);

namespace App\Actions\Api\Tag;

use App\Repositories\Tag\TagRepository;

abstract class BaseTagAction
{
    public function __construct(public TagRepository $tagRepository)
    {
    }
}
