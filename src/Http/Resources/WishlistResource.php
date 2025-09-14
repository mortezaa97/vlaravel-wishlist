<?php

declare(strict_types=1);

namespace Mortezaa97\Wishlist\Http\Resources;

use App\Http\Resources\StoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
        return [
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'story_id' => $this->story_id,
            'create_by' => $this->create_by,
            'update_by' => $this->update_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'story' => StoryResource::make($this->story),
        ];
    }
}
