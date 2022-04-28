<?php

declare(strict_types=1);

namespace App\Repositories\Tag;

use App\Http\Filters\TagFilter;
use App\Models\Tag\Tag;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TagRepository extends BaseRepository
{
    protected function getModelClass(): string
    {
        return Tag::class;
    }

    public function show(array $data): Collection
    {
        $filter = app()->make(TagFilter::class, ['queryParams' => $data]);

        $result = $this->startCondition()->filter($filter)->get();

        if (!$result) {
            abort(404, 'Tags not found');
        }

        return  $result;
    }

    public function store(array $data): Model
    {
        return $this->startCondition()->firstOrCreate(
            [
                'title' => $data['title']
            ],
            [
                'title' => $data['title']
            ]
        );
    }

    public function showOneSingleTag($id): Model
    {
        return $this->startCondition()->findOrFail($id);
    }

    public function delete(int $id): array
    {
        try {
            DB::beginTransaction();

            $tag = $this->showOneSingleTag($id);
            $tagTitle = $tag->title;
            $tag->posts()->detach();
            $tag->delete();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500, "Server error");
        }

        return [
            'message' => "Tag {$tagTitle} deleted!"
        ];
    }
}
