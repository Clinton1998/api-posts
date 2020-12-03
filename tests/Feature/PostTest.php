<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \App\Models\Post;

class PostTest extends TestCase
{
    use WithFaker,RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_stores_post()
    {
        $user = create('App\User');

        $data = [
            'title' => $this->faker->sentence($nbWords = 6,$variableNbWords = true),
            'content' => $this->faker->text($maxNbChars = 40),
            'author_id' => $user->id
        ];
        $response = $this->json('POST',$this->baseUrl.'posts',$data);
        $response->assertStatus(201);

        $this->assertDatabaseHas('posts',$data);

        $post = Post::all()->first();
        $response->assertJson([
            'data' => [
                'id' => $post->id,
                'title' => $post->title
            ]
        ]);
    }

    public function test_deletes_post(){
        create('App\User');
        $post = create('App\Models\Post');

        $response = $this->json('DELETE',$this->baseUrl.'posts/'.$post->id);
        $response->assertStatus(204);

        $this->assertNull(Post::find($post->id));
    }

    public function test_updates_post(){
        $data = [
            'title' => $this->faker->sentence($nbWords = 6,$variableNbWords = true),
            'content' => $this->faker->text($maxNbChars = 40),
        ];


        create('App\User');
        $post = create('App\Models\Post');

        $response = $this->json('PUT',$this->baseUrl.'posts/'.$post->id,$data);
        $response->assertStatus(200);
        $post = $post->fresh();

        $this->assertEquals($post->title,$data['title']);
        $this->assertEquals($post->content,$data['content']);

    }

    public function test_shows_post(){
        create('App\User');
        $post = create('App\Models\Post');

        $response = $this->json('GET',$this->baseUrl.'posts/'.$post->id);
        $response->assertStatus(200);

        $response->assertJson([
            'data' => [
                'id' => $post->id,
                'title' => $post->title
            ]
        ]);
    }
}
