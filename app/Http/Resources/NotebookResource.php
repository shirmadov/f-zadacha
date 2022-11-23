<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotebookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return array(
          'id'=>$this->id,
          'fio'=>$this->fio,
          'name'=>$this->company,
          'phone'=>$this->phone,
          'email'=>$this->email,
          'birthday'=>$this->birthday,
        );
    }
}
