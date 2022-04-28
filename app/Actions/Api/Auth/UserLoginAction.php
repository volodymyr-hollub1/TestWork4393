<?php

declare(strict_types=1);

namespace App\Actions\Api\Auth;

use Illuminate\Database\Eloquent\Model;

class UserLoginAction extends BaseAuthAction
{
    public function __invoke(array $data): Model
    {
        return $this->userRepository->checkUserLogin($data['email'], $data['password']);
    }
}
