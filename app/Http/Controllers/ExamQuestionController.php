<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExamQuestionRequest;
use App\Models\ClassStudent;
use App\Models\Exam;
use App\Models\ExamQuestions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ExamQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = ExamQuestions::query()->with(['exam']);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1" 
                                    type="button" id="action' .  $item->id . '"
                                        data-toggle="dropdown" 
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="action' .  $item->id . '">
                                <a class="dropdown-item" href="' . route('question.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="' . route('question.destroy', $item->id) . '" method="POST">
                                        ' . method_field('delete') . csrf_field() . '
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.question');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = User::all()->where('roles','GURU');
        $exam = Exam::all();
        
        return view('pages.create-question',[
            'teacher'=> $teacher,
            'exam'=>$exam,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamQuestionRequest $request)
    {
        $data = $request->all();
        $data['users_id'] = Auth::user()->id;

        $idExam = $request->exams_id;
        $exam = Exam::findOrFail($idExam);
        $class = ClassStudent::findOrFail($exam->class_students_id) ;
        $teacher = User::findOrFail($exam->users_id);

        $data['class_name'] = $class->name;
        $data['teacher_name'] = $teacher->name;

        ExamQuestions::create($data);
        return redirect()->route('question.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = ExamQuestions::findOrFail($id);
        $teacher = User::all()->where('roles','GURU');
        $examAll = Exam::all();

        return view('pages.edit-question',[
            'question' => $question,
            'examAll' => $examAll,
            'teacher' => $teacher,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExamQuestionRequest $request, $id)
    {
        $data = $request->all();
        $idExam = $request->exams_id;
        $exam = Exam::findOrFail($idExam);
        $class = ClassStudent::findOrFail($exam->class_students_id) ;
        $teacher = User::findOrFail($exam->users_id);
        $data['class_name'] = $class->name;
        $data['teacher_name'] = $teacher->name;
        $item = ExamQuestions::findOrFail($id);
        $item->update($data);
        return redirect()->route('question.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ExamQuestions::findOrFail($id);
        $data->delete($data);
        return redirect()->route('question.index');
    }
}
