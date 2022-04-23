<?php

namespace App\Repositories\Post;

use App\Http\Filters\PostFilter;
use App\Models\Post\Post;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;

class PostRepository extends BaseRepository
{
    protected function getModelClass(): string
    {
        return Post::class;
    }

    public function showPosts(array $filterData): LengthAwarePaginator
    {
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($filterData)]);
        $filterResult = $this->startCondition()->filter($filter)->paginate(20);
        
        if ($filterResult->isEmpty()) {
            abort(404, 'Posts not found');
        }
        
        return $filterResult;
    }

    public function showOneSinglePost(int $id): Model
    {
        return $this->startCondition()->findOrFail($id);
    }
}
