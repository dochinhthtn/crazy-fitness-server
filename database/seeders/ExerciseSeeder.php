<?php

namespace Database\Seeders;

use App\Models\Exercise;
use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // Exercise::factory(48)->create();
        $path = database_path('raw/exercises.json');

        $file = fopen($path, 'r');
        $content = fread($file, filesize($path));
        fclose($file);

        $data = json_decode($content, true);
        foreach($data as $exerciseData) {
            Exercise::create($exerciseData);
        }
    }
}
