<?php

namespace App\Editor;

use App\Models\Workout;

class WorkoutEditor extends Editor {
    public function save() {
        $info = $this->data['info'];
        $exercises = $this->data['exercises'];

        $workoutModel = ($this->model == null) ? new Workout() : $this->model;
        $workoutModel->name = $info['name'];
        $workoutModel->description = $info['description'];
        $workoutModel->save();

        $attachments = array_map(function($item) {
            return [
                $item['exercise_id'] => [
                    'order' => $item['order'],
                    'counter' => $item['counter']
                ]
            ];
        }, $exercises);

        $workoutModel->exercises()->syncWithoutDetaching($attachments);
    }
}