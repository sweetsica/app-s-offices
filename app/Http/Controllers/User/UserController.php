<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index() {
        try {
            $users = User::all();
            // dd($user);
            return view('User.index',compact('users'));
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
            return redirect()->route('user.index');
        } catch (Exception $e) {
            // dd($e);
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function modalEdit($id) {
        $usersDetail = User::where('id', $id)->first();
        return view('User.partials.Modal.Edit.ContentModalEdit')
        ->with('usersDetail', $usersDetail);
    }

    public function update(Request $request, $id){
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                // 'code' => 'required|unique:users,code|string|max:255',
                'code' => [
                    'nullable',
                    Rule::unique('users')->ignore($id),
                ],
                'email' => [
                    'nullable',
                    Rule::unique('users')->ignore($id),
                ],
                // 'email' => 'required|email|unique:users,email|max:255',
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
            return redirect()->route('user.index');
        } catch (Exception $e) {
            // dd($e);
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function modalDelete($id) {
        return view('User.partials.Modal.Delete.ContentModalDelete')
        ->with('id', $id);
    }

    public function destroy(string $id)
    {
        try {
            $User = User::find($id);
            $User->delete();
            return back();
        } catch (Exception $e) {
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }
}
