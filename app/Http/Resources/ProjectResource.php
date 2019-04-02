<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->when(user()->is_superadmin, $this->id),
            'uuid' => $this->uuid,
            'name' => $this->name,
            'config' => $this->config,
            'description' => $this->description,
            'shared' => $this->shared,
            'isActive' => $this->isActive,
            'code' => $this->code,
            'user' => $this->user->only(['name', 'email']),
            'created_at' => (object)[
                'formatted' => $this->created_at->format('M jS Y, h:i A'),
                'diff' => $this->created_at->diffForHumans(),
                'created' => $this->created_at->toDateTimeString()
            ],
            'updated_at' => (object)[
                'formatted' => $this->updated_at->format('M jS Y, h:i A'),
                'diff' => $this->updated_at->diffForHumans(),
                'created' => $this->updated_at->toDateTimeString()
            ],
            'items' => ItemResource::collection($this->whenLoaded('items'))
        ];
    }
}
