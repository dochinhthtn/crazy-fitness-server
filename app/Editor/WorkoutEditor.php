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

        $attachments = [];
        foreach($exercises as $exercise){
            $attachments[$exercise['id']] = [
                'order' => $exercise['order'],
                'counter' => $exercise['counter']
            ];
        }
        // dump($attachments);
        $workoutModel->exercises()->syncWithoutDetaching($attachments);
    }
}