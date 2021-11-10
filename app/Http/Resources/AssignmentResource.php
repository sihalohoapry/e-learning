<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssignmentResource extends JsonResource
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
            'users_id'=>$this->users_id,
            'name'=>$this->user->name,
            'class'=>$this->user->class->name,
            'modules_id'=>$this->modules_id,
            'title_module'=>$this->module->title,
            'assignment'=>$this->assignment,
            'note'=>$this->note,
        ];
        
    }
}
