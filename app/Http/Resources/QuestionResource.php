<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
            'exams_id'=>$this->exams_id,
            'users_id'=>$this->users_id,
            'teacher_name'=>$this->teacher_name,
            'class_name'=>$this->class_name,
            'question'=>$this->question,
            'multiple_choice_one'=>$this->multiple_choice_one,
            'multiple_choice_two'=>$this->multiple_choice_two,
            'multiple_choice_three'=>$this->multiple_choice_three,
            'multiple_choice_four'=>$this->multiple_choice_four,
            'answer'=>$this->answer,
        ];
    }
}
