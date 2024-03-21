<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Verification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('ForgotPassword');
    }

    public function show(Request $request,$id)
    {
        $userId =$id;
        return view('ForgotPassword',compact('userId'));
    }

    public function checkGmail(Request $request)
    {
        try {
            $gmail = $request->get('gmail');
            $user = User::where('email',$gmail)->first();
            if ($user) {
                $code  = rand(100000, 999999);
                $userId = $user->id;
                $data = new Verification();
                $data->code = $code;
                $data->user_id = $userId;
                $data->save();
                Mail::send('email',compact('code'),function($email) use ($gmail){
                    $email->subject('Mã xác nhận');
                    $email->to($gmail);
                });
                return Redirect::route('forgot-password',['id' => $userId]);
            } else {
                $request->session()->flash('error', 'Sai email.');
                return redirect()->back();
            }
        return view('ForgotPassword');
        } catch (Exception $e) {
            dd($e);
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function checkCode(Request $request)
    {
        try {
        $currentDateTime = Carbon::now();
        $fiveMinutesAgo = $currentDateTime->subMinutes(5);
        // dd($fiveMinutesAgo);
        $code = $request->get('code');

        $verification = Verification::
        whereBetween('created_at', [$fiveMinutesAgo,Carbon::now()])
        ->orderBy('created_at', 'desc')
        ->first();
        if ($verification && $verification->code === $code) {
            return Redirect::route('Auth.ChangePassword',['id' => $verification->user_id]);
        } else {
            $request->session()->flash('error', 'Mã không đúng.');
                return redirect()->back();
        }

    } catch (Exception $e) {
        dd($e);
        $error = $e->getMessage();
        return back()->with('error', $error);
    }
    }

    public function updatePassWord(Request $request,$id)
    {
        try {
            $passWord1 = $request->get('passWord1');
            $passWord2 = $request->get('passWord2');

            if($passWord1===$passWord2){
                $data = User::find($id);
                $data->password =  Hash::make($passWord1);
                $data->save();
                $request->session()->flash('success', 'Mật khẩu đã được thay đổi thành công.');
                return redirect()->route('Auth.login');
            }else{
                $request->session()->flash('error', 'Mật khẩu không khớp.');
                return redirect()->back();
            }
    } catch (Exception $e) {
        dd($e);
        $error = $e->getMessage();
        return back()->with('error', $error);
    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
