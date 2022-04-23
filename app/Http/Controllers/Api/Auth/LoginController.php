<?php

namespace App\Http\Controllers\Api\Auth;

use App\Actions\Api\Auth\UserLoginAction;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Auth\AuthResource;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginController
{
    public function __invoke(UserLoginAction $userLoginAction, LoginRequest $loginRequest): JsonResource
    {
        $data = $loginRequest->validated();
        
        $user = $userLoginAction($data);
        
        return new AuthResource($user);
    }
}
