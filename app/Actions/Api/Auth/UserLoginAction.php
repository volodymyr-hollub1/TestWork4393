<?php

namespace App\Actions\Api\Auth;

use Illuminate\Database\Eloquent\Model;

class UserLoginAction extends BaseAuthAction
{
    public function __invoke(array $data): Model
    {
        $user = $this->userRepository->checkUserLogin($data['email'], $data['password']);

        if (!$user) {
            abort(401, 'Email or Password is invalid');
        }

        return $user;
    }
}
