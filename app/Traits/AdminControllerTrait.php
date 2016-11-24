<?php
namespace App\Traits;

trait AdminControllerTrait
{
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
}
