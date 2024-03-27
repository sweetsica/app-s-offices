<?php

namespace App\Services\PositionServices;

use App\Models\Department;
use App\Models\Position;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class PositionServices
{
    public function index( ) {

        try {
            $positions = Position::select(
                'positions.id',
                'positions.code',
                'positions.name',
                'positions.parent_id',
                'positions.department_id',
                'positions.position_level',
                'positions.description',
            )->with('departement')->get();
            return json_decode($positions);
        } catch (Exception $e) {
            Log::error("[PositionServices][index] error " . $e->getMessage());
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function store(Request $request){
        DB::beginTransaction();
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'code' => 'required|unique:positions,code|string|max:255',
                'parent_id' =>'nullable|exists:positions,id',
                'department_id' => 'nullable',
                'position_level' => 'nullable',
                'description' => 'nullable',
            ], [
                'code.unique' => 'Mã code đã tồn tại. Vui lòng chọn một mã khác.',
            ]);
            $data = new Position();
            $data->name = $validatedData['name'];
            $data->code = $validatedData['code'];
            $data->parent_id = $validatedData['parent_id'] ?? null;
            $data->department_id = $validatedData['department_id'] ?? null;
            $data->position_level = $validatedData['position_level'] ?? null;
            $data->description = $validatedData['description'] ?? null;
            $data->save();
            $request->session()->flash('success', 'Thêm mới thành công');
            DB::commit();
            return $data;
        }catch (Exception $e) {
            DB::rollBack();
            Log::error("[PositionServices][store] error " . $e->getMessage());
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function modalEdit($id) {
        $positionDetail = Position::where('id', $id)->first();
        return json_decode($positionDetail);
    }

    public function update(Request $request, $id){
        DB::beginTransaction();
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'code' => [
                    'nullable',
                    Rule::unique('positions')->ignore($id),
                ],
                'position_level' => 'nullable',
                'department_id' => 'nullable',
                'description' => 'nullable',
            ], [
                'code.unique' => 'Mã code đã tồn tại. Vui lòng chọn một mã khác.',
            ]);
            $data = Position::find($id);
            $data->name = $validatedData['name'];
            $data->code = $validatedData['code'];
            $data->position_level = $validatedData['position_level'] ?? null;
            $data->department_id = $validatedData['department_id'] ?? null;
            $data->description=$validatedData['description'] ?? null;
            $data->save();
            $request->session()->flash('success', 'Sửa thành công');
            DB::commit();
            return $data;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("[PositionServices][update] error " . $e->getMessage());
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

}
