<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseResource extends JsonResource
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
            'countType' => $this->count_type,
            'duration' => $this->duration,
            'calories' => $this->calories,
            'difficulty' => $this->difficulty,
            'order' => $this->whenPivotLoaded('workouts_exercises', function() {
                return $this->pivot->order;
            }),
            'counter' => $this->whenPivotLoaded('workouts_exercises', function() {
                return $this->pivot->counter;
            })
        ];
    }
}
