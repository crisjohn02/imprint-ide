<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'code' => $this->code,
            'isActive' => $this->isActive,
            'config' => $this->config,
            'user_id' => $this->user_id,
            'user' => $this->user->only(['name', 'email']),
            'project_id' => $this->project_id,
            'project' => new ProjectResource($this->whenLoaded('project')),
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
            'launched_at' => $this->launched_at ?? null,
            'closed_at' => $this->closed_at ?? null
        ];
    }
}
