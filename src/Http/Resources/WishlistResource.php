<?php

declare(strict_types=1);

namespace Mortezaa97\Wishlist\Http\Resources;

use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Mortezaa97\Reviews\Http\Resources\ReviewResource;
use Mortezaa97\Shop\Http\Resources\ProductSimpleResource;

class WishlistResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return ['user_id' => new UserResource($this->user),
            'ip' => $this->ip,
            'model' => $this->whenLoaded('model', function () {
                $model = $this->model;

                return match ($model->getMorphClass()) {
                    'Mortezaa97\\Shop\\Models\\Product' => new ProductSimpleResource($model),
                    'App\\Models\\Post' => new PostResource($model),
                    'Mortezaa97\\Reviews\\Models\\Review' => new ReviewResource($model),
                    default => $model,
                };
            }),
            'created_by' => new UserResource($this->createBy),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
