<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index() {
        return view('Permission.index');
    }

    public function modalEdit($id) {
        // $departmentDetail = Department::where('id', $id)->first();
        return view('Permission.partials.Modal.Edit.ContentModalEdit');
        // ->with('departmentDetail', $departmentDetail);
    }

    public function modalDelete($id) {
        return view('Permission.partials.Modal.Delete.ContentModalDelete');
        // ->with('id', $id);
    }
}
