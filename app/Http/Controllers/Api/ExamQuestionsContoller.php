<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Models\ExamQuestions;
use Illuminate\Http\Request;

class ExamQuestionsContoller extends Controller
{
    public function getQuestionByExam(Request $request){

        $idExam = $request->input('exams_id');
        $question = ExamQuestions::where([
            ['exams_id',$idExam],
        ])->get();

        return QuestionResource::collection($question);

    }
}
