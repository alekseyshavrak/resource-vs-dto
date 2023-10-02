<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;

class UserResource extends Resource
{
    /**
     * The resource instance.
     *
     * @var User
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
            'email' => $this->resource->email,
            'name' => $this->resource->name,
            'createdAt' => $this->resource->created_at,
            'updatedAt' => $this->resource->updated_at,
        ];
    }
}
