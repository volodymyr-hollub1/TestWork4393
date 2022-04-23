<?php

namespace App\Http\Controllers\Api\Post;

use App\Actions\Api\Post\DeletePostAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class DeletePostController extends Controller
{
    public function __invoke(DeletePostAction $deletePostAction, int $id): JsonResponse
    {
        return response()->json($deletePostAction($id))->setStatusCode(202);
    }
}
