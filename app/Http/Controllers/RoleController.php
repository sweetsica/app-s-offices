<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function __construct(){
        $this->middleware('permission:Xem role|Thêm role|Sửa role|Xóa role',['only' => ['index']]);
        $this->middleware('permission:Thêm role',['only' => ['store']]);
        $this->middleware('permission:Sửa role',['only' => ['modalEdit','update']]);
        $this->middleware('permission:Xóa role',['only' => ['modalDelete','destroy']]);
    }

    public function index() {
        try {
            $roles = Role::all();
            return view('Role.index')->with('roles', $roles);
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
            $data = new Role();
            $data->name = $validatedData['name'];
            $data->save();
            $request->session()->flash('success', 'Thêm mới thành công');
            return redirect()->route('role.list');
        }catch (Exception $e) {
            dd($e);
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function modalEdit($id) {
        $roleDetail = Role::where('id', $id)->first();
        return view('Role.partials.Modal.Edit.ContentModalEdit')
        ->with('roleDetail', $roleDetail);
    }

    public function update(Request $request,$id){
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',

            ]);
            $data = Role::find($id);
            $data->name = $validatedData['name'];
            $data->save();
            $request->session()->flash('success', 'Sửa thành công');
            return redirect()->route('role.list');
        }catch (Exception $e) {
            dd($e);
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function modalDelete($id) {
        return view('Role.partials.Modal.Delete.ContentModalDelete')
        ->with('id', $id);
    }

    public function destroy(string $id)
    {
        try {
            $role = Role::find($id);
            $role->delete();
            return back();
        } catch (Exception $e) {
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }


}
