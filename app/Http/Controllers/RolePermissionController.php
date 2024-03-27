<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolePermissionController extends Controller
{

    public function __construct(){
        $this->middleware('permission:Xem quyền|Phân quyền',['only' => ['rolePermission']]);
        $this->middleware('permission:Phân quyền',['only' => ['updateRolePermission']]);
    }

    public function rolePermission($id) {
        $permissions = Permission::all();
        $role = Role::where('id', $id)->first();
        $checked =[];
        return view('Role.partials.Detail.Detail',compact('role', 'permissions'));

    }

    public function updateRolePermission(Request $req, $id) {
        $role = Role::where('id', $id)->first();
        $permissions = (array) $req->permission;
        $role->syncPermissions($permissions);
        return back()->with('message', 'Permissions updated.');
    }
}
