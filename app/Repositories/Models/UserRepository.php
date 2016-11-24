<?php

namespace App\Repositories\Models;

use App\Models\User;

class UserRepository extends AbstractModelRepository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return User::class;
    }
}
