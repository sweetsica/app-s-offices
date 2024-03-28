<?php

namespace App\Http\Controllers\FileManager;

use App\Http\Controllers\Controller;
use App\Models\FileManager;
use App\Services\FileManagerServices\FileManagerServices;
use Exception;
use Illuminate\Http\Request;

class FileManagerController extends Controller
{

    public function __construct(){
        $this->middleware('permission:Xem danh sách tài liệu|Thêm folder|Thêm file|Xóa tài liệu',['only' => ['index']]);
        $this->middleware('permission:Thêm folder',['only' => ['storeFolder']]);
        $this->middleware('permission:Thêm file',['only' => ['storeFile']]);
        // $this->middleware('permission:Xóa tài liệu',['only' => ['modalDelete','destroy']]);
    }

    public function index() {

        try {
            $fileManagerServices = new FileManagerServices();
            $data = $fileManagerServices->index();
            return view('FileManager.index',compact('data'));
        } catch (Exception $e) {
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function storeFolder(Request $request){
        try {
            $fileManagerServices = new FileManagerServices();
            $data = $fileManagerServices->storeFolder($request);
            return redirect()->route('fileManager.list');
        }catch (Exception $e) {
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function storeFile(Request $request){
        try {
            $fileManagerServices = new FileManagerServices();
            $data = $fileManagerServices->storeFile($request);
            return redirect()->route('fileManager.list');
        }catch (Exception $e) {
            dd($e);
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function modalDelete($id) {
        // return view('Position.partials.Modal.Delete.ContentModalDelete')
        // ->with('id', $id);
    }

    public function destroy(string $id)
    {
        try {
            $fileManager = FileManager::find($id);
            $fileManager->delete();
            return back();
        } catch (Exception $e) {
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }
}
