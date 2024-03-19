<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Verification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ForgotPassword');
    }

    public function checkGmail(Request $request)
    {
        try {
            $gmail = $request->get('gmail');
            $user = User::where('email',$gmail)->first();
            if ($user) {
                $code  = rand(100000, 999999);
                $userId = $user->id;
                $time = Carbon::now();
                $data = new Verification();
                $data->code = $code;
                $data->time = $time;
                $data->user_id = $userId;
                $data->save();

                Mail::send('email',compact('code'),function($email) use ($gmail){
                    $email->subject('Mã xác nhận');
                    $email->to($gmail);
                });
                return view('ForgotPassword');
            } else {
                dd('đéo có gmail này');
            }
        return view('ForgotPassword');
        } catch (Exception $e) {
            dd($e);
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    // public function seenGmail(Request $request)
    // {
    //     try {
    //         $gmail = $request->get('gmail');
    //         $user = User::where('email',$gmail)->first();
    //         if ($user) {
    //             $code  = rand(10000, 99999);
    //             $userId = $user->id;
    //             $time = Carbon::now();
    //             $data = new Verification();
    //             $data->code = $code;
    //             $data->time = $time;
    //             $data->user_id = $userId;
    //             $data->save();
    //             return view('ForgotPassword');
    //         } else {
    //             dd('đéo có gmail này');
    //         }
    //     return view('ForgotPassword');
    //     } catch (Exception $e) {
    //         dd($e);
    //         $error = $e->getMessage();
    //         return back()->with('error', $error);
    //     }
    // }

    public function checkCode(Request $request)
    {
        try {

        $currentDateTime = Carbon::now();
        $fiveMinutesAgo = $currentDateTime->subMinutes(5);
        // dd($fiveMinutesAgo);
        $code = $request->get('code');

        $verification = Verification::
        whereBetween('time', [$fiveMinutesAgo,Carbon::now()])
        ->orderBy('time', 'desc')
        ->first();
            // dd($verification);
        if ($verification && $verification->code === $code) {
            dd('oki');
        } else {
            dd('lay ma mơi nhất');
        }
        return view('ForgotPassword');
    } catch (Exception $e) {

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
        try {

        $currentDateTime = Carbon::now();
        $fiveMinutesAgo = $currentDateTime->subMinutes(5);
        $code = $request->get('code');
        $time = $currentDateTime;
        $aa = Verification::whereBetween('time', [$fiveMinutesAgo, $currentDateTime])
        ->orderBy('time', 'desc')
        ->first();
        return view('WareHouse.DanhSachNhapKho');
    } catch (Exception $e) {

        $error = $e->getMessage();
        return back()->with('error', $error);
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

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
