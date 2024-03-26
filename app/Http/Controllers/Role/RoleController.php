<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index() {
        return view('Role.index');
    }

    public function modalEdit($id) {
        // $departmentDetail = Department::where('id', $id)->first();
        return view('Role.partials.Modal.Edit.ContentModalEdit');
        // ->with('departmentDetail', $departmentDetail);
    }

    public function modalDelete($id) {
        return view('Role.partials.Modal.Delete.ContentModalDelete');
        // ->with('id', $id);
    }
}
