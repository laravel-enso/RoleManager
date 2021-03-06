<?php

namespace LaravelEnso\Roles\Http\Controllers\Permission;

use Illuminate\Routing\Controller;
use LaravelEnso\Roles\Http\Responses\RoleConfigurator;
use LaravelEnso\Roles\Models\Role;

class Index extends Controller
{
    public function __invoke(Role $role)
    {
        return new RoleConfigurator($role);
    }
}
