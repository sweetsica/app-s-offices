<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolePermissionController extends Controller
{

    public function rolePermission($id) {
        $permissions = Permission::all();
        $role = Role::where('id', $id)->first();
        return view('test',compact('role', 'permissions'));

    }
}
