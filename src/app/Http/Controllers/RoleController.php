<?php

namespace LaravelEnso\RoleManager\app\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\RoleManager\app\Models\Role;
use Illuminate\Foundation\Validation\ValidatesRequests;
use LaravelEnso\RoleManager\app\Forms\Builders\RoleForm;
use LaravelEnso\RoleManager\app\Http\Requests\ValidateRoleRequest;

class RoleController extends Controller
{
    use ValidatesRequests;

    public function create(RoleForm $form)
    {
        return ['form' => $form->create()];
    }

    public function store(ValidateRoleRequest $request, Role $role)
    {
        $role = $role->storeWithPermissions($request->validated());

        return [
            'message' => __('The role was created!'),
            'redirect' => 'system.roles.edit',
            'id' => $role->id,
        ];
    }

    public function edit(Role $role, RoleForm $form)
    {
        return ['form' => $form->edit($role)];
    }

    public function update(ValidateRoleRequest $request, Role $role)
    {
        $role->update($request->validated());

        return [
            'message' => __('The role was successfully updated'),
        ];
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return [
            'message' => __('The role was successfully deleted'),
            'redirect' => 'system.roles.index',
        ];
    }
}
