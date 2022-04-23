<?php

namespace App\Actions\Api\Auth;

use App\Models\User;
use App\Repositories\User\UserRepository;

abstract class BaseAuthAction
{
    public function __construct(public UserRepository $userRepository, public User $userModel)
    {
    }
}
