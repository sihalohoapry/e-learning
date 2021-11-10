<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ModuleResource extends JsonResource
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
            'subjects_id'=>$this->subjects_id,
            'users_id'=>$this->users_id,
            'title'=>$this->title,
            'description'=>$this->description,
            'file_type'=>$this->file_type,
            'youtube_materi'=>$this->youtube_materi,
            'document_materi'=>$this->document_materi,
        ];
        
    }
}
