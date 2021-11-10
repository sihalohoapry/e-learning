<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestions extends Model
{
    use HasFactory;

    protected $fillable = [
        'exams_id',
        'class_name',
        'teacher_name',
        'users_id',
        'question',
        'multiple_choice_one',
        'multiple_choice_two',
        'multiple_choice_three',
        'multiple_choice_four',
        'answer',
    ];

    protected $hidden = [];

    public function exam(){
        return $this->belongsTo(Exam::class,'exams_id','id');
    }

}
