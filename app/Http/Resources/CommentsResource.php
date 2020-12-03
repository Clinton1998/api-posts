<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'type' => $this->getTable(),
            'id' => $this->id,
            'attributes' => [
                'content' => $this->content
            ],
            'links' => [
                'self' => route('comments.show',$this->id)
            ]
        ];
    }
}
