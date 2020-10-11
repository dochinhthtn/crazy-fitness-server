<?php

namespace Database\Seeders;

use App\Models\Challenge;
use App\Models\Workout;
use Illuminate\Database\Seeder;

class ChallengeSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $workouts = Workout::all();

        Challenge::factory(2)->make()->each(function(Challenge $challenge) use ($workouts) {
            $order = 1;
            $attachments = array_map(function($id) use ($challenge, $order) {
                return [
                    "$id" => [
                        'challenge_id' => $challenge->id,
                        'order' => $order++
                    ]
                ];
            }, $workouts->random(2)->pluck('id'));
            $challenge->workouts()->attach($attachments);
            // dd($workouts->random(2)->pluck('id'));
        });
    }
}
