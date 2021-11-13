<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubjectResource extends JsonResource
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
            'id' =>$this->id,
            'name' =>$this->name,
            'class_students_id' =>$this->class_students_id,
            'users_id' =>$this->users_id,
            'name_class' =>$this->class->name,
            'crete' =>$this->class->created_at,

        ];
    }
}
