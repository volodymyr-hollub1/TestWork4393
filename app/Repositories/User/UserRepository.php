<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository
{
    protected function getModelClass(): string
    {
        return User::class;
    }

    public function isUserExists(string $email): Model | null
    {
        return $this->startCondition()->where('email', $email)->first();
    }

    public function checkUserLogin(string $email, string $password): Model | null
    {
        $user = $this->startCondition()->where('email', $email)->first();

        if (!$user) {
            return $user;
        } else {
            $checkPassword = Hash::check($password, $user->password);
        }

        return $checkPassword ? $user : null;
    }
}
