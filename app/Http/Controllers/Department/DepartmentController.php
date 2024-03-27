<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use App\Services\DepartmentServices\DepartmentServices;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{

    public function __construct(){
        $this->middleware('permission:Xem phòng ban|Thêm phòng ban|Sửa phòng ban|Xóa phòng ban',['only' => ['index']]);
        $this->middleware('permission:Thêm phòng ban',['only' => ['store']]);
        $this->middleware('permission:Sửa phòng ban',['only' => ['modalEdit','update']]);
        $this->middleware('permission:Xóa phòng ban',['only' => ['modalDelete','destroy']]);
    }

    public function index() {
        try {
            $departmentServices = new DepartmentServices();
            $data = $departmentServices->list();
            $treeDepartment = $departmentServices->treeDepartment();
            return view('Department.index',compact('data','treeDepartment'));
        } catch (Exception $e) {
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function store(Request $request){
        try {
            $departmentServices = new DepartmentServices();
            $data = $departmentServices->store($request);
            return redirect()->route('department.list');
        }catch (Exception $e) {
            dd($e);
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function modalEdit($id) {
        $departmentServices = new DepartmentServices();
        $dataDetail = $departmentServices->modalEdit($id);
        return view('Department.partials.Modal.Edit.ContentModalEdit')
        ->with('dataDetail', $dataDetail);
    }

    public function update(Request $request,$id){
        try {
            $departmentServices = new DepartmentServices();
            $data = $departmentServices->update($request,$id);
            return redirect()->route('department.list');
        }catch (Exception $e) {
            dd($e);
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function modalDelete($id) {
        return view('Department.partials.Modal.Delete.ContentModalDelete')
        ->with('id', $id);
    }

    public function destroy(string $id)
    {
        try {
            $department = Department::find($id);
            $department->delete();
            return back();
        } catch (Exception $e) {
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }
}
