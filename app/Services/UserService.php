<?php

namespace App\Services;

use App\Models\User;
use App\User\Data\UserData;

class UserService
{
    /**
     * Create a new class instance.
     */
    public function __construct() {}
    public function getAll(bool $usaPaginate = false) {
        $userQuery = User::query()->latest();
        if($usaPaginate){
            $userQuery->paginate(20);
        }

        return $userQuery;
    }

    public function getOne(User $user): User{
        return $user;
    }

    public function create(UserData $data): User{
        return User::create($data->toModelAttributes());
    }

    public function update(User $user, UserData $data): User{
        $user::update($data->toModelAttributes());

        return $user->refresh();
    }

    public function delete(User $user){
        $user->delete();
    }
}
