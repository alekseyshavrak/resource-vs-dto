<?php

namespace App\Http\Resources;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostResource extends Resource
{
    /**
     * The resource instance.
     *
     * @var Post
     */
    public $resource;

    /**
     * Оригинальные значения
     *
     * @param  Request  $request
     * @return array
     */
    public function toAttributes(Request $request): array
    {
        return [
            'userId' => $this->resource->user_id,
            'category' => $this->resource->category,
            'title' => $this->resource->title,
            'content' => $this->resource->content,
            'createdAt' => $this->resource->created_at,
            'updatedAt' => $this->resource->updated_at,
        ];
    }

    /**
     * Связи с другими ресурсами
     *
     * @param  Request  $request
     * @return array
     */
    public function toRelationships(Request $request): array
    {
        return [
            'user' => $this->whenLoaded(
                relationship: 'user',
                value: fn() => UserResource::make(
                    resource: $this->resource->user
                )
            ),
        ];
    }

    /**
     * Дополнительные данные
     *
     * @param  Request  $request
     * @return array
     */
    public function toAppends(Request $request): array
    {
        return [
            'createdText' => $this->resource->created_at->isoFormat('D MMMM YYYY'),
            'categoryTitle' => $this->resource->category->title(),
        ];
    }

    /**
     * Данные политики
     *
     * @param  Request  $request
     * @return array
     */
    public function toPolicies(Request $request): array
    {
        return [
            'update' => Gate::allows('update', $this->resource),
            'delete' => Gate::allows('delete', $this->resource),
        ];
    }
}
