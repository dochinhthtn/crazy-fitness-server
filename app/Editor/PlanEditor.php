<?php

namespace App\Editor;

use App\Models\Date;
use App\Models\Plan;

class PlanEditor extends Editor {
    public function save() {

        $info = $this->data["info"];
        $dates = $this->data["dates"];

        if ($this->model == null) {
            $this->model = Plan::create($info);
            $this->model->dates()->createMany($dates);
        } else {
            $this->model->update($info);

            foreach ($dates as $date) {
                $dateModel = (isset($date['id'])) ? Date::find($date['id']) : new Date();
                $dateModel->plan_id = $this->model->id;
                $dateModel->order = $date['order'];
                $dateModel->workout_id = $date['workout_id'];
                $dateModel->meal_id = $date['meal_id'];
                $dateModel->save();
            }
        }
    }
}