<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Models\ModelRepositoryInterface;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    protected $model;

    protected $viewPrefix;

    protected $routePrefix;

    /**
     * Create a new Dashboard Controller
     *
     * @return void
     */
    public function __construct(ModelRepositoryInterface $model)
    {
        $this->model = $model;

        view()->share([
            'routePrefix' => cmsRouteName($this->getRoutePrefix()),
            'viewPrefix' => cmsViewName($this->getViewPrefix()),
            'page_name' => $this->getPageName()
        ]);
    }

    public function index()
    {
        return view($this->getView('index'), [
            $this->getPluralName() => $this->model->all()
        ]);
    }

    public function create()
    {
        return view($this->getView('form'), [
            'flg' => false
        ]);
    }

    public function store(Request $request)
    {
        $this->validateForm($request);

        $this->model->create($request->all());

        session()->flash('msg-success', $this->getSuccessMessage(__FUNCTION__));
        return $this->redirectToIndex();
    }

    public function edit($keyId)
    {
        $model = $this->model->find($keyId);

        if ($model) {
            return view($this->getView('form'), [
                'flg' => true,
                $this->getSingularName() => $model
            ]);
        }
        return $this->redirectToIndex();
    }

    public function update(Request $request, $keyId)
    {
        $this->validateForm($request);

        $result = $this->model->update($request->all(), $keyId);

        session()->flash($result ? 'msg-success' : 'msg-fail', $this->getMessage($result, __FUNCTION__));
        return $this->redirectToIndex();
    }

    public function destroy($keyId)
    {
        $result = $this->model->destroy($keyId);

        session()->flash($result ? 'msg-success' : 'msg-fail', $this->getMessage($result, __FUNCTION__));
        return $this->redirectToIndex($result);
    }

    protected function getMessage($result, $method)
    {
        if ($result) {
            session()->flash('msg-success', $this->getSuccessMessage($method));
        }
        session()->flash('msg-fail', $this->getFailMessage());
    }

    protected function getFailMessage()
    {
        return $this->getControllerName() . ' not found!';
    }

    protected function getSuccessMessage($method = null)
    {
        if ($method == 'store') {
            return 'New ' . $this->getControllerName() . ' object successfully created!';
        } elseif ($method == 'update') {
            return $this->getControllerName() . ' object successfully updated!';
        } elseif ($method == 'destroy') {
            return $this->getControllerName() . ' object successfully deleted!';
        }
        return $this->getControllerName();
    }

    protected function redirectToIndex()
    {
        return redirect()->route($this->getRoute('index'));
    }

    protected function validateForm(Request $request)
    {
        $request->merge(['is_superuser' => $request->get('is_superuser', 0)]);
        $request->merge(['is_active' => $request->get('is_active', 0)]);

        $rules = $this->model->getBaseRules();

        if ($request->method() == 'POST') {
            $this->model->getCreateRules($rules);
        } elseif ($request->method() == 'PUT') {
            $this->model->getUpdateRules($rules);
        }

        return $this->validate($request, $rules);
    }

    /* Get Controller name without 'Controller' postfix
     * @return string
     */
    public function getControllerName()
    {
        return preg_replace("/(.*)[\\\\](.*)(Controller)/", '$2', get_class($this));
    }

    public function getSingularName()
    {
        return strtolower($this->getControllerName());
    }

    public function getPluralName()
    {
        return str_plural($this->getSingularName());
    }

    /**
     * Get Page header for page title.  By default the value is uppercase word and snake case of controller name
     * @return [type] [description]
     */
    public function getPageName()
    {
        $name = snake_case($this->getControllerName(), '-');
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

        return str_plural(snake_case($this->getControllerName()));
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

        return str_plural(snake_case($this->getControllerName(), '-'));
    }
}
