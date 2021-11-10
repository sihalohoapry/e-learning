<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => $this->id ,
            'name' => $this->name ,
            'main_number' => $this->main_number ,
            'email' => $this->email ,
            'password' => $this->password ,
            'roles' => $this->roles ,
            'gender' => $this->gender ,
            'class_students_id' => $this->class_students_id ,
            'name_class' => $this->class->name,
            'photo_user' => $this->photo_user,
        ];
    }
}
