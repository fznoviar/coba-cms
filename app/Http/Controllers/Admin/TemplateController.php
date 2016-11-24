<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\AdminControllerTrait;

class TemplateController extends Controller
{
    use AdminControllerTrait;

    /**
     * Create a new Dashboard Controller
     *
     * @return void
     */
    public function __construct()
    {
        view()->share([
            'page_name' => $this->getPageNameFromClass()
        ]);
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

    protected function getView($name)
    {
        return cmsViewName('_templates.' . $name);
    }
}
