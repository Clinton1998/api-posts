<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\UserResource;
use App\Http\Resources\CommentsResource;

class PostRelationShipController extends Controller
{
    public function author(Post $post){
    	return new UserResource($post->author);
    }

    public function comments(Post $post){
    	return CommentsResource::collection($post->comments);
    }
}
