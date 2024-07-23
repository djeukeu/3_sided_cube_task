<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostMessageResource;
use App\Http\Resources\PostResource;
use App\Models\Post;

/**
 * Class PostController.
 * @author  Christian <christian@djeukeu.com>
 */
class PostController extends Controller
{
    /**
     * Get all posts.
     * @OA\Get(
     *     path="/api/posts",
     *     operationId="getAllPosts",
     *     @OA\Response(
     *         response=200,
     *         description="list of posts",
     *         @OA\JsonContent(
     *         type="object",
     *         @OA\Property(property="data", type="object"),
     *         @OA\Property(property="link", type="object"),
     *         @OA\Property(property="meta", type="object"),
     *       ),
     *     ),
     * )
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
    public function show(string $id)
    {
        return new PostResource(Post::findOrFail($id));
    }

    /**
     * Update the specified post.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        $post = Post::find($id);
        $post->update($request->all());
        return new PostMessageResource('Post Updated Successfully');
    }

    /**
     * Remove the specified post.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        return new PostMessageResource('Post Deleted Successfully');
    }
}
