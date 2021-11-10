<?php

namespace App\Http\Controllers;

use App\Models\ClassStudent;
use App\Models\ExamQuestions;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index(){
        $student = User::all()->where('roles','SISWA')->count();
        $teacher = User::all()->where('roles','GURU')->count();
        $subject = Subject::all()->count();
        $class = ClassStudent::all()->count();
        $question = ExamQuestions::all()->count();
        return view('pages.dashboard',[
            'student'=> $student,
            'teacher'=> $teacher,
            'subject'=> $subject,
            'class'=> $class,
            'question'=> $question,
        ]);
    }
}
