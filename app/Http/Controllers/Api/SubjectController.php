<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubjectResource;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function getSubject(){
        return SubjectResource::collection(Subject::all());
    }

    public function getSubjectByClass(Request $request){

        $idClass = $request->input('class_students_id');
        $subject = Subject::where([
            ['class_students_id',$idClass],
        ])->get();

        if($subject->isEmpty()){
            return response()->json([
                'status'=>FALSE,
                'msg'=> 'Kelas Ini Belum Ada Mata Pelajaran'
            ],200);
        }

        return SubjectResource::collection($subject);

    }
    public function getSubjectByTeacher(Request $request){

        $idTeacher = $request->input('users_id');
        $subject = Subject::where([
            ['users_id',$idTeacher],
        ])->get();

        if($subject->isEmpty()){
            return response()->json([
                'status'=>FALSE,
                'msg'=> 'Maaf tidak mata pelajaran yang anda ajar'
            ],200);
        }

        return SubjectResource::collection($subject);

    }

}
