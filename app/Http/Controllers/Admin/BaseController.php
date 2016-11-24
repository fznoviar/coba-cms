<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected $viewPrefix;

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

    /* Get Controller name without 'Controller' postfix
     * @return string
     */
    public function getClassName()
    {
        return preg_replace("/(.*)[\\\\](.*)(Controller)/", '$2', get_class($this));
    }

    /**
     * Get Page header for page title.  By default the value is uppercase word and snake case of controller name
     * @return [type] [description]
     */
    public function getPageNameFromClass()
    {
        $name = snake_case($this->getClassName(), '-');
        $name = implode(' ', explode('-', $name));
        return ucwords($name);
    }

    public function getView($name)
    {
        return cmsViewName($this->viewPrefix . '.' . $name);
    }

    public function getRoute($name)
    {
        return cmsRouteName($this->routePrefix . '.' . $name);
    }
}
