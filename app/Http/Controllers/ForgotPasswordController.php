<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Verification;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

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
        $user = User::where('gmail',$gmail)
        ->first();

        if ($user) {
            dd('oki');
        } else {
            dd('đéo có gmail này');
        }
        return view('ForgotPassword');
    } catch (Exception $e) {

        $error = $e->getMessage();
        return back()->with('error', $error);
    }
    }

    public function checkCode(Request $request)
    {
        try {
        $currentDateTime1 = Carbon::now();
        $currentDateTime = Carbon::now();
        $fiveMinutesAgo = $currentDateTime->addMinutes(5);
        // dd($currentDateTime);
        $code = $request->get('code');

        $verification = Verification::
        whereBetween('time', [Carbon::now(), $fiveMinutesAgo])
        // ->orderBy('time', 'desc')
        ->first();

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
