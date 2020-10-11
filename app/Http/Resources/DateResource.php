<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DateResource extends JsonResource
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
            'order' => $this->order,
            'workout' => new WorkoutResource($this->workout),
            'meal' => new MealResource($this->meal)
        ];
    }
}
