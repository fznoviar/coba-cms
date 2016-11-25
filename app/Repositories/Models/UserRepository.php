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

    public function getBaseRules()
    {
        return [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'email',
            'password' => 'confirmed',
            'is_superuser' => 'in:0,1',
            'is_active' => 'in:0,1'
        ];
    }

    public function getCreateRules($rules)
    {
        $rules['email'] .= '|required|unique:users,email';
        $rules['password'] .= '|required';

        parent::getCreateRules($rules);
    }

    public function getUpdateRules($rules)
    {
        parent::getUpdateRules($rules);
    }
}
