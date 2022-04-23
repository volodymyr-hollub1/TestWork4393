<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class TagFilter extends AbstractFilter
{
    private const TAG_ID = 'tag_id';
    private const TAG_TITLE = 'title';

    protected function getCallBacks(): array
    {
        return [
            self::TAG_ID => [$this, 'id'],
            self::TAG_TITLE => [$this, 'title']
        ];
    }

    public function id(Builder $builder, string $value): void
    {
        $builder->where('id', $value);
    }

    public function title(Builder $builder, string $value): void
    {
        $builder->where('title', 'like', "%{$value}}");
    }
}
