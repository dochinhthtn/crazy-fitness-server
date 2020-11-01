<?php

namespace App\Editor;

use App\Models\Meal;

class MealEditor extends Editor {
    public function save() {
        if($this->model == null) {
            $this->model = Meal::create($this->data);
        } else {
            $this->model->update($this->data);
        }
    }
}