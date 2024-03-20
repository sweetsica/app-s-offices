<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        return view('Auth.Login');
    }

    public function loginUser(Request $request)
    {
        try {

            $email = $request->input('username');
            $password = $request->input('userpassword');
            // $password =  Hash::make($request->userpassword);
            // dd($password);
            $account = User::where(function ($query) use ($email) {
                $query->where('email', $email);
            })->first();

            $credentials = ['email' => $email, 'password' => $password];

            if (Auth::attempt($credentials)) {
                // Đăng nhập thành công
                return redirect()->route('dashborad.index');
            } else {
                // Đăng nhập thất bại
                return redirect()->back()
                    ->withInput()
                    ->with('loginError', 'Sai tài khoản hoặc mật khẩu');
            }
        } catch (Exception $e) {
            dd($e);
            return back()->with('loginError', 'Sai tài khoản hoặc mật khẩu');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    public function formResetPassword() {
        return view('Auth.ResetPassword');
    }

    public function formChangePassword(Request $request,$id) {

        $userId =$id;
        return view('Auth.ChangePassword',compact('userId'));
    }
}
