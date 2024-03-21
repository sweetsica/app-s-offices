<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Exception;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index() {
        try {
            $departments = Department::all();
            return view('Department.index',compact('departments'));
        } catch (Exception $e) {
            // dd($e);
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function store(Request $request){
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'code' => 'required|unique:departments,code|string|max:255',
                'parent_id' => 'required|integer',
                'order' => 'required|integer',
                'area_id' => 'required|integer',
                'user_id' => 'required|integer',
                'description' => 'required|string|max:500',
            ], [
                'code.unique' => 'Mã code đã tồn tại. Vui lòng chọn một mã khác.',
            ]);
            $data = new Department();
            $data->name = $validatedData['name'];
            $data->code = $validatedData['code'];
            $data->parent_id = $validatedData['parent_id'];
            $data->order = $validatedData['order'];
            $data->area_id = $validatedData['area_id'];
            $data->user_id = $validatedData['user_id'];
            $data->description = $validatedData['description'];
            $data->save();
            $request->session()->flash('success', 'Thêm mới thành công');
            return redirect()->route('department.list');
        }catch (Exception $e) {
            // dd($e);
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }
}
