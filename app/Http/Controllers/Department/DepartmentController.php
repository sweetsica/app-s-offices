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
    public function index() {
        try {
            $departmentServices = new DepartmentServices();
            $data = $departmentServices->list();
            $treeDepartment = $departmentServices->treeDepartment();
            // dd($data);
            return view('Department.index',compact('data','treeDepartment'));
        } catch (Exception $e) {
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    // public function treeDepartment() {
    //     try {
    //         $departmentServices = new DepartmentServices();
    //         $data = $departmentServices->treeDepartment();
    //         // dd($data);
    //         return view('Department.index',compact('data'));
    //     } catch (Exception $e) {
    //         $error = $e->getMessage();
    //         return back()->with('error', $error);
    //     }
    // }

    public function store(Request $request){
        try {
            $newOrderService = new DepartmentServices();
            $data = $newOrderService->store($request);
            return redirect()->route('department.list');
        }catch (Exception $e) {
            dd($e);
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function modalEdit($id) {
        $departmentDetail = Department::where('id', $id)->first();
        return view('Department.partials.Modal.Edit.ContentModalEdit')
        ->with('departmentDetail', $departmentDetail);
    }

    public function update(Request $request,$id){
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'code' => [
                    'nullable',
                    Rule::unique('departments')->ignore($id),
                ],
                'parent_id' =>'nullable|exists:departments,id',
                'order' => 'nullable',
                'area_id' => 'nullable',
                'user_id' => 'nullable',
                'description' => 'string|max:500',
            ], [
                'code.unique' => 'Mã code đã tồn tại. Vui lòng chọn một mã khác.',
            ]);
            $data = Department::find($id);
            $descendantIds = $data->getAllDescendantIds();
            $data->name = $validatedData['name'];
            $data->code = $validatedData['code'];
            $data->parent_id = $validatedData['parent_id'] ?? null;

            if ($request->filled('parent_id')) {
                $parent_id = $request->input('parent_id');
                $descendantIds = $data->getAllDescendantIds();
                // Kiểm tra xem parent_id mới có trong tập hợp descendantIds không
                if (in_array($parent_id, $descendantIds)) {
                    return back()->with('error', 'Bạn không thể chọn phòng ban con hoặc cháu làm phòng ban cha.');
                }
            }

            $data->order = $validatedData['order'] ?? null;
            $data->area_id = $validatedData['area_id'] ?? null;
            $data->user_id = $validatedData['user_id'] ?? null;
            $data->description = $validatedData['description'] ?? null;
            $data->save();
            $request->session()->flash('success', 'Sửa thành công');
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
