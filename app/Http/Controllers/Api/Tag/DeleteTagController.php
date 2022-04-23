<?php

namespace App\Http\Controllers\Api\Tag;

use App\Actions\Api\Tag\DeleteTagAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class DeleteTagController extends Controller
{
    public function __invoke(DeleteTagAction $deleteTagAction, int $id): JsonResponse
    {
        return response()->json($deleteTagAction($id))->setStatusCode(202);
    }
}
