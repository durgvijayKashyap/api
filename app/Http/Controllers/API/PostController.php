<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return new PostCollection(Post::paginate());
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }

    public function store()
    {
        return new PostResource(Post::create(request()->validate([
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required'
        ])));
    }

    public function update(Post $post)
    {
        $post->update(request()->validate([
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required'
        ]));

        return new PostResource($post);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json(['data'=>'Post deleted successfully']);
    }
}
