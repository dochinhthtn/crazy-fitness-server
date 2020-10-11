<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\WorkoutResource;
use App\Models\Workout;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    //
    public function getWorkout(Workout $workout){
        return new WorkoutResource($workout);
    }

    public function addWorkout() {

    }

    public function updateWorkout() {
        
    }
}
