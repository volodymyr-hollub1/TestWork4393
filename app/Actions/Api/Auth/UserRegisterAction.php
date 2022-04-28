<?php

declare(strict_types=1);

namespace App\Actions\Api\Auth;

use Illuminate\Database\Eloquent\Model;

class UserRegisterAction extends BaseAuthAction
{
    public function __invoke(array $data): Model
    {
        return $this->userRepository->store($data);
    }
}
