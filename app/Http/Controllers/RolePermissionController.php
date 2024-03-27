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
        return view('Role.partials.Detail.Detail',compact('role', 'permissions'));

    }

    public function updateRolePermission(Request $req, $id) {
        dd($id);
        $role = Role::where('id', $id)->first();
        if($role->hasPermissionTo($req->permission)){
            return back()->with('message', 'Permission exists.');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added.');
    }
}
