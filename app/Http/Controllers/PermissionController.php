<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index() {
        try {
            $permissions = Permission::all();
            return view('Permission.index',compact('permissions'));
        } catch (Exception $e) {
            dd($e);
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function store(Request $request){
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
            ]);
            $data = new Permission();
            $data->name = $validatedData['name'];
            $data->save();
            $request->session()->flash('success', 'Thêm mới thành công');
            return redirect()->route('permission.list');
        }catch (Exception $e) {
            dd($e);
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function modalEdit($id) {
        $permissionDetail = Permission::where('id', $id)->first();
        return view('Permission.partials.Modal.Edit.ContentModalEdit')
        ->with('permissionDetail', $permissionDetail);
    }

    public function update(Request $request,$id){
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',

            ]);
            $data = Permission::find($id);
            $data->name = $validatedData['name'];
            $data->save();
            $request->session()->flash('success', 'Sửa thành công');
            return redirect()->route('permission.list');
        }catch (Exception $e) {
            dd($e);
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function modalDelete($id) {
        return view('Permission.partials.Modal.Delete.ContentModalDelete')
        ->with('id', $id);
    }

    public function destroy(string $id)
    {
        try {
            $role = Permission::find($id);
            $role->delete();
            return back();
        } catch (Exception $e) {
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }
}
