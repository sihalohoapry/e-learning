<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultExam extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'teacher_name',
        'class_name',
        'exams_id',
        'exam_name',
        'result',
    ];

    public function user(){
        return $this->hasOne(User::class,'id','users_id');
    }
}
