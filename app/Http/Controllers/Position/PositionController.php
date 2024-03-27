<?php

namespace App\Http\Controllers\Position;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Services\PositionServices\PositionServices;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PositionController extends Controller
{

    public function __construct(){
        $this->middleware('permission:Xem vị trí|Thêm vị trí|Sửa vị trí|Xóa vị trí',['only' => ['index']]);
        $this->middleware('permission:Thêm vị trí',['only' => ['store']]);
        $this->middleware('permission:Sửa vị trí',['only' => ['modalEdit','update']]);
        $this->middleware('permission:Xóa vị trí',['only' => ['modalDelete','destroy']]);
    }

    public function index( ) {

        try {
            $positionServices = new PositionServices();
            $data = $positionServices->index();
            return view('Position.index',compact('data'));
        } catch (Exception $e) {
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function store(Request $request){
        try {
            $positionServices = new PositionServices();
            $data = $positionServices->store($request);
            return redirect()->route('position.list');
        }catch (Exception $e) {
            dd($e);
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function modalEdit($id) {
        $positionServices = new PositionServices();
        $dataDetail = $positionServices->modalEdit($id);
        return view('Position.partials.Modal.Edit.ContentModalEdit')
        ->with('dataDetail', $dataDetail);
    }

    public function update(Request $request, $id){
        try {
            $positionServices = new PositionServices();
            $data = $positionServices->update($request,$id);
            return redirect()->route('position.list');
        } catch (Exception $e) {
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function modalDelete($id) {
        return view('Position.partials.Modal.Delete.ContentModalDelete')
        ->with('id', $id);
    }

    public function destroy(string $id)
    {
        try {
            $position = Position::find($id);
            $position->delete();
            return back();
        } catch (Exception $e) {
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

}
