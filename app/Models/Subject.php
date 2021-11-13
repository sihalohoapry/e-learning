<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable =[
        'class_students_id',
        'users_id',
        'name',
        'photo_subject',
    ];

    protected $hidden =[];

    public function class(){
        return $this->belongsTo(ClassStudent::class, 'class_students_id','id');
    }
    
    public function module(){
        return $this->hasMany(Module::class,'modules_id','id');
    }

    public function user(){
        return $this->hasOne(User::class,'id','users_id');
    }

}
