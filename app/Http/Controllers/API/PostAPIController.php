<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use App\Http\Requests\API\CreatePostAPIRequest;
use App\Http\Requests\API\UpdatePostAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostAPIController extends AppBaseController
{
    /**
     * Display a listing of the Post.
     * GET /api/posts
     */
    public function index(Request $request): JsonResponse
    {
        $query = Post::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Posts retrieved successfully');
    }

    /**
     * Store a newly created Post.
     * POST /api/posts
     */
    public function store(CreatePostAPIRequest $request): JsonResponse
    {
        $post = Post::create($request->all());
        return $this->sendResponse($post->toArray(), 'Post saved successfully');
    }

    /**
     * Display the specified Post.
     * GET /api/posts/{id}
     */
    public function show(int $id): JsonResponse
    {
        $post = Post::find($id);
        if (empty($post)) {
            return $this->sendError('Post not found');
        }
        return $this->sendResponse($post->toArray(), 'Post retrieved successfully');
    }

    /**
     * Update the specified Post.
     * PUT /api/posts/{id}
     */
    public function update(int $id, UpdatePostAPIRequest $request): JsonResponse
    {
        $post = Post::find($id);
        if (empty($post)) {
            return $this->sendError('Post not found');
        }
        $post->fill($request->all())->save();
        return $this->sendResponse($post->toArray(), 'Post updated successfully');
    }

    /**
     * Remove the specified Post.
     * DELETE /api/posts/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $post = Post::find($id);
        if (empty($post)) {
            return $this->sendError('Post not found');
        }
        $post->delete();
        return $this->sendSuccess('Post deleted successfully');
    }
}