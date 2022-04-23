<?php

namespace App\Actions\Api\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class UserRegisterAction extends BaseAuthAction
{
    public function __invoke(array $data)
    {
        $user = $this->userRepository->isUserExists($data['email']);

        if ($user) {
            abort(401);
        }

        return $this->userModel->create([
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
