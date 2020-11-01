<?php

namespace App\Editor;

use App\Models\Exercise;

class ExerciseEditor extends Editor {
    public function save() {
        if($this->model == null) {
            $this->model = Exercise::create($this->data);
        } else {
            $this->model->update($this->data);
        }
    }
}