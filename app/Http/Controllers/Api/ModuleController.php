<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ModuleResource;
use App\Models\Module;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\True_;
use Validator;

class ModuleController extends Controller
{
    public function createModule(Request $request){
        $input = $request->all();
        $validator = Validator::make($input,[
            'subjects_id'=>'required|integer',
            'users_id'=>'required|integer',
            'title'=>'required|string|max:50',
            'description'=>'nullable',
            'file_type'=>'nullable',
            'youtube_materi'=>'nullable|max:255',
            'document_materi'=>'nullable|mimes:mp4,pdf|max:6200',
        ]);

        if($validator->fails()){
            return response()->json([
                "status"=>FALSE,
                "msg"=>$validator->errors(),
            ],200);
        }

        if($request->hasFile('document_materi')){
            $input['document_materi']= $request->file('document_materi')->store('assets/module/document','public');
        }

        Module::create($input);
        return response()->json([
            "status" => TRUE,
            "msg" => 'Modul Berhasil Ditambah'
        ],200);

    }

    public function moduleBySubject(Request $request){
        $idSubject = $request->input('subjects_id');
        $module = Module::where([
            ['subjects_id', $idSubject],
        ])->get();

        if($module->isEmpty()){
            return response()->json([
                'status'=>FALSE,
                'msg' => "Belum Ada Materi"
            ],200);
        }

        return ModuleResource::collection($module);

    }

    public function editModule(Request $request){
        $input = $request->all();
        $module = Module::find($request->get('id'));

        if(is_null($module)){
            return response()->json([
                'status' => FALSE,
                'msg' => "Tidak ada module"
            ],404);
        }
        $validator = Validator::make($input,[
            'document_materi' => 'sometimes|mimes:mp4,pdf|max:6200'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => FALSE,
                'msg' => $validator->error
            ],400);
        }
        if($request->hasFile('document_materi')){
            if($request->file('document_materi')->isValid()){
                $input['document_materi'] = $request->file('document_materi')->store('assets/module/document','public');
            }
        }

        $module->update($input);
        return response()->json([
            'status'=> TRUE,
            'msg'=> 'Berhasil mengupdate'
        ],200);

    }
    public function deleteModule( Request $request){
        $module = Module::find($request->get('id'));
        $module->delete($module);
        return response()->json([
            'status'=> TRUE,
            'msg'=> 'Berhasil menghapus'
        ],200);

    }

}
