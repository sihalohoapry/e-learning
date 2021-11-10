<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResultExamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'users_id'=>$this->users_id,
            'student'=>$this->user->name,
            'teacher_name'=>$this->teacher_name,
            'class_name'=>$this->class_name,
            'exams_id'=>$this->exams_id,
            'exam_name'=>$this->exam_name,
            'result'=>$this->result,

        ];
        
    }
}
