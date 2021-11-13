<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExamResource;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function getAllExam(){
        return ExamResource::collection(Exam::all());
    }

    public function getExamByIdTeacher(Request $request){
        $idTeacher = $request->input('users_id');
        $exam = Exam::where([
            ['users_id', $idTeacher],
        ])->get();

        if($exam->isEmpty()){
            return response()->json([
                'status' => FALSE,
                'msg'=> 'Anda tidak mengampuh ujian'
            ],200);
        }
        return ExamResource::collection($exam);

    }
    public function getExamByIdClass(Request $request){
        $id = $request->input('class_students_id');
        $exam = Exam::where([
            ['class_students_id', $id],
        ])->get();

        if($exam->isEmpty()){
            return response()->json([
                'status' => FALSE,
                'msg'=> 'Ujian Tidak Tersedia di Kelas Ini'
            ],200);
        }
        return ExamResource::collection($exam);

    }
}
