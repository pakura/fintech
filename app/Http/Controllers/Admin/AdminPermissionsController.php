<?php

namespace App\Http\Controllers\Admin;

use Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class AdminPermissionsController extends Controller
{
    /**
     * The Permission instance.
     *
     * @var \Models\Permission
     */
    protected $model;

    /**
     * The Request instance.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Create a new controller instance.
     *
     * @param  \Models\Permission  $model
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Permission $model, Request $request)
    {
        $this->model = $model;

        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->checkAccess();

        $data['roles'] = [];

        foreach ((array) user_roles() as $key => $value) {
            if ($key == 'admin') {
                continue;
            }

            $data['roles'][$key] = $value;
        }

        $data['current'] = [];

        if ($role = $this->request->get('role', key($data['roles']))) {
            $data['current'] = $this->model->role($role)
                ->pluck('route_name')
                ->toArray();
        }

        $routeNames = array_diff_key(
            $this->getAllRouteNames(),
            array_flip(Permission::$routeGroupsHidden)
        );

        // ksort($routeNames);

        $data['routes'] = $routeNames;

        $data['namesDisallowed'] = Permission::$routeNamesHidden;

        return view('admin.permissions.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->checkAccess();

        $this->model->clear($role = $this->request->get('role'));

        $input = $this->request->get('permissions', []);

        $attributes = [];

        foreach ((array) $input as $key => $value) {
            if (in_array(key($value), Permission::$routeGroupsHidden)){
                continue;
            }

            $attributes['role'] = $role;
            $attributes['route_name'] = current($value);

            $this->model->create($attributes);
        }

        return redirect(cms_route('permissions.index', ['role' => $role]))
            ->with('alert', fill_data('success', trans('general.saved')));
    }

    /**
     * Determine if the user has access to the given route
     *
     * @return void
     *
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    protected function checkAccess()
    {
        $user = $this->request->user('cms');

        if (! $user->isAdmin()) {
            throw new AccessDeniedHttpException;
        }
    }

    /**
     * Get all cms route names.
     *
     * @return array
     */
    protected function getAllRouteNames()
    {
        $routes = app('router')->getRoutes();

        $routeNames = [];

        $prevRouteName = null;

        $cmsSlug = cms_slug();

        foreach ($routes as $key => $route) {
            $routeName = $route->getName();

            if (! is_null($routeName) && strpos($route->getPrefix(), $cmsSlug) !== false) {
                if ($prevRouteName == $routeName) continue;

                $baseRouteName = explode('.', substr($routeName, 0, strrpos($routeName, '.')));

                $routeNames[$baseRouteName[0]][] = $routeName;

                $prevRouteName = $routeName;
            }
        }

        return $routeNames;
    }
}
