<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResource
    {
        $posts = Post::query()
            ->with(['user'])
            ->orderByDesc('created_at')
            ->paginate();

        return PostResource::collection(
            resource: $posts
        );
    }
}
