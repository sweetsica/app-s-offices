<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

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
            $name = $request->get('name');
            $code = $request->get('code');
            $email = $request->get('email');
            $status = $request->get('status');
            $position_id  = $request->get('position_id');
            $department_id = $request->get('department_id');
            $data = new User();
            $data->name = $name;
            $data->code=$code;
            $data->email=$email;
            $data->status=$status;
            $data->save();
            Session::flash('success', 'Thêm mới thành công');
            return redirect()->route('user.index');
        } catch (Exception $e) {
            dd($e);
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }
}
