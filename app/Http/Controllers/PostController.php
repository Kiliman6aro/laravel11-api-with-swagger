<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/posts",
     *      operationId="index",
     *      tags={"Posts"},
     *      summary="Display a listing of the resource",
     *      security={{"bearerAuth": {}}},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/Post")
     *          ),
     *      ),
     * )
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return PostResource::collection(Post::all());
    }

    /**
     * @OA\Post(
     *      path="/api/posts",
     *      operationId="store",
     *      tags={"Posts"},
     *      summary="Store a newly created resource in storage",
     *      security={{"bearerAuth": {}}},
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Post")
     *      ),
     * )
     */
    public function store(PostRequest $request): PostResource
    {
        $post = Post::create($request->validated());
        return new PostResource($post);
    }

    /**
     * @OA\Get(
     *      path="/api/posts/{id}",
     *      operationId="show",
     *      tags={"Posts"},
     *      summary="Display the specified resource",
     *      security={{"bearerAuth": {}}},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="ID of the post",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Post")
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Post not found"
     *      )
     * )
     */
    public function show(Post $post): PostResource
    {
        return new PostResource($post);
    }

    /**
     * @OA\Put(
     *      path="/api/posts/{id}",
     *      operationId="update",
     *      tags={"Posts"},
     *      summary="Update the specified resource",
     *      security={{"bearerAuth": {}}},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="ID of the post",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Post")
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Post not found"
     *      )
     * )
     */
    public function update(PostRequest $request, Post $post): PostResource
    {
        $post->update($request->validated());
        return new PostResource($post);
    }

    /**
     * @OA\Delete(
     *      path="/api/posts/{id}",
     *      operationId="destroy",
     *      tags={"Posts"},
     *      summary="Remove the specified resource from storage",
     *      security={{"bearerAuth": {}}},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="ID of the post",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Post not found"
     *      )
     * )
     */
    public function destroy(Post $post): Response
    {
        $post->delete();
        return response(null, 204);
    }
}
