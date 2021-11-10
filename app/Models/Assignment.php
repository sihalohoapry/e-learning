<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'modules_id',
        'assignment',
        'note',
    ];

    protected $hidden = [];

    public function user(){
        return $this->hasOne(User::class,'id','users_id');
    }

    public function module(){
        return $this->belongsTo(Module::class,'modules_id','id');
    }

}
