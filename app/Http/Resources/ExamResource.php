<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExamResource extends JsonResource
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
            'id' => $this->id,
            'users_id'=> $this->users_id,
            'teacher'=> $this->user->name,
            'class_students_id' => $this->class_students_id,
            'class_name' => $this->class->name,
            'name' => $this->name,
        ];
    }
}
