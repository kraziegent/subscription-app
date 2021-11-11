<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    /**
     * Store a new user in the database.
     *
     * @param array $data
     * @return User
     */
    public function storeUser(array $data)
    {
        $user = User::create($data);

        return $user;
    }
}
