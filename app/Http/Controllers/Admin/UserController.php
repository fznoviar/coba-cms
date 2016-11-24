<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Models\UserRepository;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    protected $user;

    protected $viewPrefix = 'users';

    protected $routePrefix = 'users';

    /**
     * Create a new Dashboard Controller
     *
     * @return void
     */
    public function __construct(UserRepository $user)
    {
        parent::__construct();
        $this->user = $user;
    }

    public function index()
    {
        return view($this->getView('index'), [
            'users' => $this->user->all()
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

        $this->user->create($request->all());

        return $this->redirectToIndex();
    }

    public function edit($keyId)
    {
        $user = $this->user->find($keyId);

        return view($this->getView('form'), [
            'flg' => true,
            'user' => $user
        ]);
    }

    public function update(Request $request, $keyId)
    {
        $user = $this->user->find($keyId);

        $this->validateForm($request);

        $user->update($request->all());

        return $this->redirectToIndex();
    }

    protected function redirectToIndex()
    {
        return redirect()->route($this->getRoute('index'));
    }

    protected function validateForm(Request $request)
    {
        $request->merge(['is_superuser' => $request->get('is_superuser', 0)]);
        $request->merge(['is_active' => $request->get('is_active', 0)]);

        $rules = [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'email',
            'password' => 'confirmed',
            'is_superuser' => 'in:0,1',
            'is_active' => 'in:0,1'
        ];

        if ($request->method() == 'POST') {
            $rules['email'] .= '|required|unique:users,email';
            $rules['password'] .= '|required';
        }

        return $this->validate($request, $rules);
    }
}
