<?php

namespace App\Repositories\Tag;

use App\Http\Filters\TagFilter;
use App\Models\Tag\Tag;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TagRepository extends BaseRepository
{
    protected function getModelClass(): string
    {
        return Tag::class;
    }

    public function showTags(array $data): Collection | null
    {
        $filter = app()->make(TagFilter::class, ['queryParams' => $data]);
        
        return $this->startCondition()->filter($filter)->get() ?? abort(404, 'Tags not found');
    }
    
    public function showOneSingleTag(int $id): Model
    {
        return $this->startCondition()->findOrFail($id);
    }
}
