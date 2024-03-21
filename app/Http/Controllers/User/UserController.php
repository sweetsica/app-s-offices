<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
                // 'position_id' => 'required|integer',
                // 'department_id' => 'required|integer',
            ], [
                'code.unique' => 'Mã code đã tồn tại. Vui lòng chọn một mã khác.',
                'email.unique' => 'Email đã tồn tại. Vui lòng chọn một email khác.'
            ]);
            $data = new User();
            $data->name = $validatedData['name'];
            $data->code = $validatedData['code'];
            $data->email = $validatedData['email'];
            $data->status = $validatedData['status'];
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
}
