<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkoutResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'exercises' => ExerciseResource::collection($this->exercises),
            'order' => $this->whenPivotLoaded('challenges_workouts', function() {
                return $this->pivot->order;
            })
        ];
    }
}
