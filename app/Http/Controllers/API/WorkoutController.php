<?php

namespace App\Http\Controllers\API;

use App\Editor\WorkoutEditor;
use App\Http\Controllers\Controller;
use App\Http\Requests\WorkoutRequest;
use App\Http\Resources\WorkoutResource;
use App\Http\Responses\SimpleResponse;
use App\Models\Workout;

class WorkoutController extends Controller
{
    //
    public function getWorkouts() {
        return WorkoutResource::collection(Workout::paginate(5));
    }

    public function getWorkout(Workout $workout){
        return new WorkoutResource($workout);
    }

    public function addWorkout(WorkoutRequest $workoutRequest) {
        $workoutEditor = WorkoutEditor::open();
        $workoutEditor->saveWithData($workoutRequest->all());

        return SimpleResponse::success(['message' => 'WORKOUT.ADDED.SUCCESS']);
    }

    public function updateWorkout(WorkoutRequest $workoutRequest, Workout $workout) {
        $workoutEditor = WorkoutEditor::open($workout);
        $workoutEditor->saveWithData($workoutRequest->all());

        return SimpleResponse::success(['message' => 'WORKOUT.UPDATED.SUCCESS']);
    }

    public function deleteWorkout(Workout $workout) {
        $workout->delete();

        return SimpleResponse::success(['message' => 'WORKOUT.DELETED.SUCCESS']);
    }
}
