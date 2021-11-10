<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable=[
        'users_id',
        'class_students_id',
        'name',
        'photo_exam',
    ];

    protected $hidden = [];

    public function class(){
        return $this->belongsTo(ClassStudent::class,'class_students_id','id');
    }

    public function user(){
        return $this->hasOne(User::class,'id','users_id');
    }

}
