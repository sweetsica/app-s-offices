<?php

namespace App\Services\UserServices;

use App\Models\Department;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class UserServices
{

    public function index() {
        try {
            $users = User::with('department','position')->get();
            return json_decode($users);
        } catch (Exception $e) {
            Log::error("[UserServices][index] error " . $e->getMessage());
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function store(Request $request){
        DB::beginTransaction();
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'code' => 'required|unique:users,code|string|max:255',
                'email' => 'required|email|unique:users,email|max:255',
                'status' => 'required|string|max:255',
                'position_id' => 'nullable',
                'department_id' => 'nullable',
            ], [
                'code.unique' => 'Mã code đã tồn tại. Vui lòng chọn một mã khác.',
                'email.unique' => 'Email đã tồn tại. Vui lòng chọn một email khác.'
            ]);
            $data = new User();
            $data->name = $validatedData['name'];
            $data->code = $validatedData['code'];
            $data->email = $validatedData['email'];
            $data->status = $validatedData['status'];
            $data->position_id = $validatedData['position_id'];
            $data->department_id = $validatedData['department_id'];
            $data->password= Hash::make(123456);
            $data->save();
            $request->session()->flash('success', 'Thêm mới thành công');
            DB::commit();
            return $data;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("[UserServices][store] error " . $e->getMessage());
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function modalEdit($id) {
        $usersDetail = User::where('id', $id)->first();
        return json_decode($usersDetail);
    }

    public function update(Request $request, $id){
        DB::beginTransaction();
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'code' => [
                    'nullable',
                    Rule::unique('users')->ignore($id),
                ],
                'email' => [
                    'nullable',
                    Rule::unique('users')->ignore($id),
                ],
                'status' => 'required|string|max:255',
                'position_id' => 'nullable',
                'department_id' => 'nullable',
                'password' => 'nullable',
            ], [
                'code.unique' => 'Mã code đã tồn tại. Vui lòng chọn một mã khác.',
                'email.unique' => 'Email đã tồn tại. Vui lòng chọn một email khác.'
            ]);
            $data = User::find($id);
            $data->name = $validatedData['name'];
            $data->code = $validatedData['code'];
            $data->email = $validatedData['email'];
            $data->status = $validatedData['status'];
            $data->position_id = $validatedData['position_id'];
            $data->department_id = $validatedData['department_id'];
            if( $validatedData['password']!=''){
                // dd(1);
            $data->password=$validatedData['password'];
            }
            $data->save();
            $request->session()->flash('success', 'Sửa thành công');
            DB::commit();
            return $data;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("[UserServices][update] error " . $e->getMessage());
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

}
