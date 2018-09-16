<?php

namespace App\Http\Controllers\Admin;

use Models\CmsUser;
use Illuminate\Http\Request;
use App\Support\Admin\AdminDestroy;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests\Admin\CmsUserRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class AdminCmsUsersController extends Controller
{
    /**
     * The CmsUser instance.
     *
     * @var \Models\CmsUser
     */
    protected $model;

    /**
     * The authenticated user instance.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * Create a new controller instance.
     *
     * @param  \Models\CmsUser  $model
     * @param  \Illuminate\Contracts\Auth\Guard  $guard
     * @return void
     */
    public function __construct(CmsUser $model, Guard $guard)
    {
        $this->model = $model;

        $this->auth = $guard;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['items'] = $this->model->adminFilter($request)
            ->orderDesc()
            ->paginate(20);

        return view('admin.cms_users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function create()
    {
        if (! $this->user()->isAdmin()) {
            throw new AccessDeniedHttpException;
        }

        $data['current'] = $this->model;

        $data['roles'] = user_roles();

        return view('admin.cms_users.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\CmsUserRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function store(CmsUserRequest $request)
    {
        if (! $this->user()->isAdmin()) {
            throw new AccessDeniedHttpException;
        }

        $input = $request->all();

        if (! $request->has('password')) {
            unset($input['password']);
        } else {
            $input['password'] = bcrypt($input['password']);
        }

        $model = $this->model->create($input);

        app('db')->table('cms_settings')->insert(['cms_user_id' => $model->id]);

        return redirect(cms_route('cmsUsers.edit', [$model->id]))
            ->with('alert', fill_data('success', trans('general.created')));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $data['current'] = $this->model->findOrFail($id);

        return view('admin.cms_users.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function edit($id)
    {
        if (! $this->user()->isAdmin() && $this->user()->id != $id) {
            throw new AccessDeniedHttpException;
        }

        $data['current'] = $this->model->findOrFail($id);

        $data['roles'] = user_roles();

        return view('admin.cms_users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\CmsUserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     *
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function update(CmsUserRequest $request, $id)
    {
        if (! $this->user()->isAdmin() && $this->user()->id != $id) {
            throw new AccessDeniedHttpException;
        }

        $input = $request->all();

        if ($request->has('password')) {
            $input['password'] = bcrypt($input['password']);
        }

        $this->model->findOrFail($id)->update($input);

        unset($input['password'], $input['password_confirmation']);

        if ($request->expectsJson()) {
            return response()->json(fill_data(
                'success', trans('general.updated'), $input
            ));
        }

        return redirect()->back()->with('alert', fill_data(
            'success', trans('general.updated')
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return mixed
     */
    public function destroy($id)
    {
        if ($this->user()->isAdmin()) {
            if ($this->user()->id == $id) {
                $this->model = null;
            }
        } else {
            $this->model = null;
        }

        return (new AdminDestroy($this->model, $id, false))->handle();
    }

    /**
     * Get the authenticated user instance.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    protected function user()
    {
        return $this->auth->user();
    }
}
