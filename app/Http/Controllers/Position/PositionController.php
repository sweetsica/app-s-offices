<?php

namespace App\Http\Controllers\Position;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PositionController extends Controller
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
            // dd($positions);
            return view('Position.index',compact('positions'));
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
            return redirect()->route('position.list');
        }catch (Exception $e) {
            dd($e);
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function modalEdit($id) {
        $positionDetail = Position::where('id', $id)->first();
        return view('Position.partials.Modal.Edit.ContentModalEdit')
        ->with('positionDetail', $positionDetail);
    }

    public function update(Request $request, $id){
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
            return redirect()->route('position.list');
        } catch (Exception $e) {
            dd($e);
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function modalDelete($id) {
        return view('Position.partials.Modal.Delete.ContentModalDelete')
        ->with('id', $id);
    }

    public function destroy(string $id)
    {
        try {
            $position = Position::find($id);
            $position->delete();
            return back();
        } catch (Exception $e) {
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

}
