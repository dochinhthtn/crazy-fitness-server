<?php

namespace Database\Seeders;

use App\Models\Date;
use App\Models\Meal;
use App\Models\Plan;
use App\Models\Workout;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $workouts = Workout::all();
        $meals = Meal::all();

        Plan::factory(10)->create()->each(function(Plan $plan) use ($workouts, $meals) {
            // each plan has 20 dates
            for($i = 0; $i < 20; $i++) {
                $plan->dates()->save(Date::factory()->createOne([
                    'plan_id' => $plan->id,
                    'order' => $i + 1,
                    'workout_id' => $workouts->random()->id,
                    'meal_id' => $meals->random()->id
                ]));
            }
        });
    }
}
