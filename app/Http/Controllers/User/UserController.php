<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserServices\UserServices;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index() {
        try {
            $userServices = new UserServices();
            $data = $userServices->index();
            return view('User.index',compact('data'));
        } catch (Exception $e) {
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function store(Request $request){
        try {
            $userServices = new UserServices();
            $data = $userServices->store($request);
            return redirect()->route('user.index');
        } catch (Exception $e) {
            // dd($e);
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function modalEdit($id) {
        $userServices = new UserServices();
        $dataDetail = $userServices->modalEdit($id);
        return view('User.partials.Modal.Edit.ContentModalEdit')
        ->with('dataDetail', $dataDetail);
    }

    public function update(Request $request, $id){
        try {
            $userServices = new UserServices();
            $data = $userServices->update($request,$id);
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
