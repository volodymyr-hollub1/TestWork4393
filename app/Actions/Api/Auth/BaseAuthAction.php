<?php

declare(strict_types=1);

namespace App\Actions\Api\Auth;

use App\Repositories\User\UserRepository;

abstract class BaseAuthAction
{
    public function __construct(public UserRepository $userRepository)
    {
    }
}
