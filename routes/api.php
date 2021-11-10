<?php

use App\Http\Controllers\Api\AssignmentController;
use App\Http\Controllers\Api\ClassStudentController;
use App\Http\Controllers\Api\ExamController;
use App\Http\Controllers\Api\ExamQuestionsContoller;
use App\Http\Controllers\Api\ModuleController;
use App\Http\Controllers\Api\ResultController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\UserContorller;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get-class', [ClassStudentController::class, 'getAllClass']);
Route::get('get-subject', [SubjectController::class, 'getSubject']);
Route::post('login', [UserContorller::class, 'login']);
Route::post('user',[UserContorller::class,'getUserById']);
Route::post('create-module', [ModuleController::class,'createModule']);
Route::post('get-module', [ModuleController::class,'moduleBySubject']);
Route::post('update-module', [ModuleController::class,'editModule']);
Route::delete('delete-module', [ModuleController::class,'deleteModule']);

Route::get('get-all-exam', [ExamController::class,'getAllExam'] );

Route::post('exam-by-class',[ExamController::class,'getExamByIdClass'] );
Route::post('subject-by-class',[SubjectController::class,'getSubjectByClass'] );

Route::post('question-by-exam',[ExamQuestionsContoller::class,'getQuestionByExam'] );

Route::post('post-result', [ResultController::class,'postResult']);
Route::post('update-result', [ResultController::class,'updateResult']);
Route::post('get-result-by-exam', [ResultController::class,'getResultByExam']);


Route::post('update-profile', [UserContorller::class,'editProfile']);
Route::post('post-assignment', [AssignmentController::class,'postAssignment']);
Route::post('get-assignment-by-module', [AssignmentController::class,'getAssgnmentByModule']);
Route::post('get-assignment-by-user', [AssignmentController::class,'getAssignmentByUser']);
Route::post('get-assignment-by-user-module', [AssignmentController::class,'getAssignmentByUserAndModule']);