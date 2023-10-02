<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array
    {
        $relationships = $this->toRelationships($request);
        $appends = $this->toAppends($request);
        $policies = $this->toPolicies($request);

        $data = [
            'id' => $this->resource->id,
            'type' => $this->resource->getTable(),
            'attributes' => $this->toAttributes($request),
        ];

        if (count($relationships) > 0) {
            $data['relationships'] = $relationships;
        }

        if (count($appends) > 0) {
            $data['appends'] = $appends;
        }

        if (count($policies) > 0) {
            $data['policies'] = $policies;
        }

        return $data;
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

        ];
    }

    /**
    * Оригинальные значения
    *
    * @param  Request  $request
    * @return array
    */
    public function toAttributes(Request $request): array
    {
        return [

        ];
    }
}
