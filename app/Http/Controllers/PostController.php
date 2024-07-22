<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostMessageResource;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of posts.
     */
    public function index()
    {
        return PostResource::collection(Post::paginate());
    }

    /**
     * Store a newly created post.
     */
    public function store(StorePostRequest $request)
    {
        return new PostResource(Post::create($request->all()));
    }

    /**
     * Display the specified post.
     */
    public function show(Post $post)
    {
        return new PostResource(Post::findOrFail($post->id));
    }

    /**
     * Update the specified post.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->all());
        return new PostMessageResource('Post Updated Successfully');
    }

    /**
     * Remove the specified post.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return new PostMessageResource('Post Deleted Successfully');
    }
}
