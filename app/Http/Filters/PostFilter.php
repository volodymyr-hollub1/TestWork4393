<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    private const TITLE = 'title';
    private const CONTENT = 'contact';
    private const POST_ID = 'post_id';
    private const TAG_ID = 'tag_id';

    protected function getCallBacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::CONTENT => [$this, 'content'],
            self::POST_ID => [$this, 'id'],
            self::TAG_ID => [$this, 'tags']
        ];
    }

    public function title(Builder $builder, string $value): void
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function content(Builder $builder, string $value): void
    {
        $builder->where('content', 'like', "%{$value}%");
    }

    public function id(Builder $builder, string $value): void
    {
        $builder->where('id', $value);
    }

    public function tags(Builder $builder, string $value)
    {
        $builder->whereHas('tags', function ($query) use ($value) {
            return $query->where('tag_id', $value);
        });
    }
}
