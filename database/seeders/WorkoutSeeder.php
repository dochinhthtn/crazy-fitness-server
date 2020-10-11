<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\Workout;
use Illuminate\Database\Seeder;

class WorkoutSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $exercises = Exercise::all();

        Workout::factory(15)->create()->each(function($workout) use ($exercises){
            $num =  rand(5, 12);
            for($i = 0; $i < $num; $i++) {
                $workout->exercises()->attach([
                    $exercises->random()->id => [
                        'order' => $i + 1,
                        'counter' => rand(10, 30)
                    ]
                ]);
            }
        });
    }
}
