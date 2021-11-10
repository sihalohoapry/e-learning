<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResultExamResource;
use App\Models\Exam;
use App\Models\ResultExam;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\True_;
use Validator;

class ResultController extends Controller
{
    public function postResult(Request $request){
        $input = $request->all();
        $validator = Validator::make($input,[
            'users_id'=>'required|integer',
            'teacher_name'=>'required|string|max:50',
            'class_name'=>'required|string|max:50',
            'exams_id'=>'required|integer',
            'exam_name'=>'required|string|max:50',
            'result'=>'required|integer',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>FALSE,
                'msg'=>$validator->errors(),
            ],200);
        }

        ResultExam::create($input);
        return response()->json([
            'status' =>TRUE,
            'msg'=>'Nilai Berhasil Disimpan'
        ],200);

    }

    public function updateResult(Request $request){
        $idResult = $request->input('id');
        $updateResult = ResultExam::find($idResult);

        if(is_null($updateResult)){
            return response()->json([
                'status'=>FALSE,
                'msg'=>"Tidak dapat menambah nilai"
            ], 200);
        }

        $result = $updateResult->result + 1;
        $updateResult->update(['result'=>$result]);
        return response()->json([
            'status' => TRUE,
            'msg' => "Nilai Berhasil ditambah"
        ],200);

    }

    public function getResultByExam(Request $request){
        $idExam = $request->input('exams_id');
        $result = ResultExam::where([
            ['exams_id', $idExam],
        ])->get();
        if(is_null($result)){
            return response()->json([
                'status' => FALSE,
                'msg' => "Hasil Ujian Tidak Ditemukan"
            ],200);
        }

        return ResultExamResource::collection($result);
    }
}
