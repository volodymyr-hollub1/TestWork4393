<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use App\Actions\Api\Auth\UserRegisterAction;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\AuthResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterController
{
    public function __invoke(UserRegisterAction $userRegisterAction, RegisterRequest $registerRequest): JsonResource
    {
        $data = $registerRequest->validated();

        $result = $userRegisterAction($data);

        return new AuthResource($result);
    }
}
