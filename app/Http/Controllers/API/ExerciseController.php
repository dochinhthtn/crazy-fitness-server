<?php

namespace App\Http\Controllers\API;

use App\Editor\ExerciseEditor;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExerciseRequest;
use App\Http\Resources\ExerciseResource;
use App\Models\Exercise;

class ExerciseController extends Controller {
    //

    public function getExercises() {
        return ExerciseResource::collection(Exercise::paginate(10));
    }

    public function getExercise(Exercise $exercise) {
        return new ExerciseResource($exercise);
    }

    public function addExercise(ExerciseRequest $exerciseRequest) {
        $editor = ExerciseEditor::open();
        $editor->saveWithData($exerciseRequest->all());
    }

    public function updateExercise(ExerciseRequest $exerciseRequest, Exercise $exercise) {
        $editor = ExerciseEditor::open($exercise);
        $editor->saveWithData($exerciseRequest->all());
    }

    public function deleteExercise(Exercise $exercise) {
        $exercise->delete();
    }

    public function searchExercises(string $keyword) {
        
    }
}
