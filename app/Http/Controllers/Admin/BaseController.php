<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected $viewPrefix;

    protected $routePrefix;

    /**
     * Create a new Dashboard Controller
     *
     * @return void
     */
    public function __construct()
    {
        view()->share([
            'routePrefix' => cmsRouteName($this->getRoutePrefix()),
            'viewPrefix' => cmsViewName($this->getViewPrefix()),
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
        return cmsViewName($this->getViewPrefix() . '.' . $name);
    }

    public function getRoute($name)
    {
        return cmsRouteName($this->getRoutePrefix() . '.' . $name);
    }

    /**
     * Get View Prefix. By default the value is plurar from and snake case of controller name
     * @return string
     */
    protected function getViewPrefix()
    {
        if ($this->viewPrefix !== null) {
            return $this->viewPrefix;
        }

        return str_plural(snake_case($this->getClassName()));
    }

    /**
     * Get Route Prefix. By default the value is plurar from and snake case of controller name
     * @return string
     */
    protected function getRoutePrefix()
    {
        if ($this->routePrefix !== null) {
            return $this->routePrefix;
        }

        return str_plural(snake_case($this->getClassName(), '-'));
    }
}
