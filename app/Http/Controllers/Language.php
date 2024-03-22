<?php
// namespace App\Controllers;
// use Illuminate\Support\Facades\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class Language extends Controller
{
	public function index(Request $request)
	{
        // $session = session();
        // $locale = service('request')->getLocale();
        // $session->remove('lang');
        // $session->set('lang',$locale);
        // return redirect()->to($_SERVER['HTTP_REFERER']);
        dd(1);
        // App::setLocale($request->lang);
        // if (session()->has('locale')) {
        //     session()->forget('locale');
        // }
        // session()->put('locale', $request->lang);
        // return back();
    }
}
