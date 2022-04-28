<?php

declare(strict_types=1);

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

    public function checkUserLogin(string $email, string $password): Model
    {
        $user = $this->startCondition()->where('email', $email)->first();

        if (!$user) {
            abort(401, 'Email or Password is invalid');
        } else {
            $checkPassword = Hash::check($password, $user->password);
        }

        if (!$checkPassword) {
            abort(401, 'Email or Password is invalid');
        }

        return $user;
    }

    public function store(array $data): Model
    {
        $user = $this->startCondition()->isUserExists($data['email']);

        if ($user) {
            abort(401);
        }
        
        return $this->startCondition()->create([
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
