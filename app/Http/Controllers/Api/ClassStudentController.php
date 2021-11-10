<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClassStudentResource;
use App\Models\ClassStudent;
use Illuminate\Http\Request;

class ClassStudentController extends Controller
{
    public function getAllClass(){
        return ClassStudentResource::collection(ClassStudent::all());
    }
}
