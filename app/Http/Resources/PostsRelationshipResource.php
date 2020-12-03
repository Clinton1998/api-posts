<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostsRelationshipResource extends JsonResource
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
            'author' => [
                'links' => [
                  'self' => route('posts.relationships.author',$this->id),
                  'related' => route('posts.author',$this->id)
                ],
                'data' => new AuthorIndetifierResource($this->author)
            ],
            'comments' => (new PostCommentsRelationshipCollection($this->comments))->additional(['post' => $this])
        ];
    }
}
