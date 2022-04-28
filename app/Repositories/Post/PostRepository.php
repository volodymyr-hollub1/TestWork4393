<?php

namespace App\Repositories\Post;

use App\Http\Filters\PostFilter;
use App\Models\Post\Post;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostRepository extends BaseRepository
{
    protected function getModelClass(): string
    {
        return Post::class;
    }

    public function show(array $data): mixed
    {
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $filterResult = $this->startCondition()->filter($filter)->paginate(20);

        if ($filterResult->isEmpty()) {
            abort(404, 'Posts not found');
        }

        return $filterResult;
    }

    public function showOne(int $id): Model
    {
        return $this->startCondition()->findOrFail($id);
    }

    public function store(array $data): Model
    {
        $post = $this->startCondition()->firstOrCreate(
            [
                'title' => $data['title']
            ],
            [
                'title' => $data['title'],
                'content' => $data['content'],
                'slug' => $data['slug']
            ]
        );

        if ($data['tags']) {
            $post->tags()->attach($data['tags']);
        }

        return $post->fresh('tags');
    }

    public function update(array $data, int $id): Model
    {
        try {
            DB::beginTransaction();
            
            $post = $this->showOne($id);
            $tags = $data['tags'];
            unset($data['tags']);
            $post->update(array_filter($data));
            $post->tags()->sync($tags);
            
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            Log::info($exception->getMessage());
            abort(500, "Server error");
        }


        return $post->fresh('tags');
    }

    public function delete(int $id): array
    {
        try {
            DB::beginTransaction();
            
            $post = $this->showOne($id);
            $postId = $post->id;
            $post->tags()->detach();
            $post->delete();
            
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::info($exception->getMessage());
            abort(500, "Server error");
        }
        
        return [
            'message' => "Post #{$postId} deleted"
        ];
    }
}
