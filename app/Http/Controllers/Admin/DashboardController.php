<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new Dashboard Controller
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index()
    {
        return view(cmsViewName('index'));
    }
}
