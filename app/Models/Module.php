<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'subjects_id',
        'users_id',
        'title',
        'description',
        'file_type',
        'youtube_materi',
        'document_materi',
    ];

    protected $hidden = [];

    public function user(){
        return $this->hasOne(User::class,'id','users_id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class,'subjects_id','id');
    }

}
