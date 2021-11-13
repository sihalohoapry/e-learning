<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AssignmentResource;
use App\Models\Assignment;
use App\Models\Module;
use Illuminate\Http\Request;
use Validator;

class AssignmentController extends Controller
{
    public function postAssignment(Request $request){
        $input = $request->all();
        $validator = Validator::make($input,[
           'users_id' =>'required|integer',
           'modules_id' =>'required|integer',
           'assignment' =>'required|string',
           'note' =>'sometimes|string',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => FALSE,
                'msg'=> $validator->errors(),
            ],400);
        }
        // if($request->hasFile('assignment')){
        //     $input['assignment']= $request->file('assignment')->store('assets/module/assignment','public');
        // }

        Assignment::create($input);
        return response()->json([
            'status' =>TRUE,
            'msg'=> "Berhasil mengumpulkan tugas"
        ],200);

    }


    public function getAssgnmentByModule(Request $request){
        $modules_id = $request->input('modules_id');
        $assignment = Assignment::where([
            ['modules_id', $modules_id]
        ])->get();

        if($assignment->isEmpty()){
            return response()->json([
                'status'=> FALSE,
                'msg'=> "Tidak ada tugas yang dikumpul"
            ],200);
        }
        return AssignmentResource::collection($assignment);

    }

    public function getAssignmentByUser(Request $request){
        $idUSer = $request->input('users_id');
        $assignment = Assignment::where([
            ['users_id',$idUSer],
        ])->get();

        if($assignment->isEmpty()){
            return response()->json([
                'status' => FALSE,
                'msg' => "Tidak Ada tugas yang dikumpul",
            ],200);
        }

        return AssignmentResource::collection($assignment);
        
    }

    public function getAssignmentByUserAndModule( Request $request){
        $idUser = $request->input('users_id');
        $module = $request->input('modules_id');
        
        $assignment = Assignment::where([
            ['users_id', $idUser],
            ['modules_id',$module],
        ])->get();

        if($assignment->isEmpty()){
            return response()->json([
                'status' => FALSE,
                'msg'=>"Tidak ada tugas"
            ],200);
        }
        return AssignmentResource::collection($assignment);

    }

    

}
