<?php

namespace App\Services\FileManagerServices;

use App\Models\Department;
use App\Models\FileManager;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class FileManagerServices
{

    public function index() {
        try {
            $fileManager = FileManager::all();
            return json_decode($fileManager);
        } catch (Exception $e) {
            Log::error("[FileManagerServices][index] error " . $e->getMessage());
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function storeFile(Request $request){
        DB::beginTransaction();
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'code' => 'required|unique:file_manager,code|string|max:255',
                'type' => 'nullable',
                'user_id' => 'nullable',
                'parent_id' => 'nullable',
            ], [
                'code.unique' => 'Mã code đã tồn tại. Vui lòng chọn một mã khác.',
            ]);
            $data = new FileManager();
            $data->name = $validatedData['name'];
            $data->code = $validatedData['code'];
            $data->type ='1';
            $data->user_id = $validatedData['user_id'];
            $data->parent_id = $validatedData['parent_id'];
            $data->save();
            $request->session()->flash('success', 'Thêm mới thành công');
            DB::commit();
            return $data;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("[FileManagerServices][store] error " . $e->getMessage());
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

    public function storeFolder(Request $request){
        DB::beginTransaction();
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'code' => 'required|unique:file_manager,code|string|max:255',
                'type' => 'nullable',
                'user_id' => 'nullable',
                'parent_id' => 'nullable',
            ], [
                'code.unique' => 'Mã code đã tồn tại. Vui lòng chọn một mã khác.',
            ]);
            $data = new FileManager();
            $data->name = $validatedData['name'];
            $data->code = $validatedData['code'];
            $data->type ='0';
            $data->user_id = $validatedData['user_id'];
            $data->parent_id = $validatedData['parent_id'];
            $data->save();
            $request->session()->flash('success', 'Thêm mới thành công');
            DB::commit();
            return $data;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("[FileManagerServices][store] error " . $e->getMessage());
            $error = $e->getMessage();
            return back()->with('error', $error);
        }
    }

}
