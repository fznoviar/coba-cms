<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Models\UserRepository;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    /**
     * Create a new User Controller
     *
     * @param  App\Repositories\Models\UserRepository $user [user repository object]
     * @return void
     */
    public function __construct(UserRepository $user)
    {
        parent::__construct($user);
    }
}
