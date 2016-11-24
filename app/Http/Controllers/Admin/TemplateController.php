<?php

namespace App\Http\Controllers\Admin;

class TemplateController extends BaseController
{
    /**
     * Create a new Dashboard Controller
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view($this->getView('index'));
    }

    public function create()
    {
        return view($this->getView('form'), [
            'flg' => false
        ]);
    }

    public function edit()
    {
        return view($this->getView('form'), [
            'flg' => true
        ]);
    }
}
