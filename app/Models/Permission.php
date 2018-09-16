<?php

namespace Models;

use Models\Abstracts\Model;

class Permission extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role', 'route_name'
    ];

    /**
     * The attributes that are not updatable.
     *
     * @var array
     */
    protected $notUpdatable = [];

    /**
     * Route group names that are hidden for list.
     *
     * @var array
     */
    public static $routeGroupsHidden = ['cmsUsers', 'permissions', 'login', 'logout', 'lockscreen'];

    /**
     * Route names that are hidden for list.
     *
     * @var array
     */
    public static $routeNamesHidden = [];

    /**
     * Get the list of permissions by user id.
     *
     * @param  string  $value
     * @return \Models\Builder\Builder
     */
    public function role($value)
    {
        return $this->where('role', $value);
    }

    /**
     * Determine if the user has access to the given route.
     *
     * @param  string  $routeName
     * @return bool
     */
    public function hasAccess($routeName)
    {
        return $this->where('route_name', $routeName)->exists();
    }

    /**
     * Clear permissions from the database.
     *
     * @param  int  $value
     * @return bool|null
     */
    public function clear($value)
    {
        return $this->role($value)->delete();
    }
}
