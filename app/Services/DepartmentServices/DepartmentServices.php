<?php

namespace App\Services\DepartmentServices;

use App\Models\Department;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DepartmentServices
{

    public function list() {
        try {
            $departments = Department::select(
                'departments.id',
                'departments.code',
                'departments.name',
                'departments.parent_id',
                'departments.order',
                'departments.user_id',
                'departments.description',
                'departments.area_id'
            )->with('user','daddy','children')->get();
            $tree = Department::getDepartmentsTree();
            $jsonTree = json_encode($tree);
            $decodedTree = json_decode($jsonTree, true);
            dd($decodedTree);
            return json_decode($departments);
        } catch (Exception $e) {
            Log::error("[DepartmentServices][list] error " . $e->getMessage());
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function store(Request $request){
        DB::beginTransaction();
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'code' => 'required|unique:departments,code|string|max:255',
                'parent_id' =>'nullable|exists:departments,id',
                'order' => 'nullable',
                'area_id' => 'nullable',
                'user_id' => 'nullable',
                'description' => 'nullable',
            ], [
                'code.unique' => 'Mã code đã tồn tại. Vui lòng chọn một mã khác.',
            ]);
            $data = new Department();
            $data->name = $validatedData['name'];
            $data->code = $validatedData['code'];
            $data->parent_id = $validatedData['parent_id'] ?? null;
            $data->order = $validatedData['order'] ?? null;
            $data->area_id = $validatedData['area_id'] ?? null;
            $data->user_id = $validatedData['user_id'] ?? null;
            $data->description = $validatedData['description'] ?? null;
            $data->save();
            $request->session()->flash('success', 'Thêm mới thành công');
            DB::commit();
            return $data;
        }catch (Exception $e) {
            DB::rollBack();
            Log::error("[DepartmentServices][store] error " . $e->getMessage());
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function treeDepartment() {
        try {

            $tree = Department::getDepartmentsTree();
            $jsonTree = json_encode($tree);
            // $decodedTree = json_decode($jsonTree, true);

            return json_decode($jsonTree);
        } catch (Exception $e) {
            Log::error("[DepartmentServices][treeDepartment] error " . $e->getMessage());
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

}
