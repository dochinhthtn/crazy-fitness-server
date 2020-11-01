<?php

use App\Http\Controllers\API\ExerciseController;
use App\Http\Controllers\API\PlanController;
use App\Http\Controllers\API\WorkoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::get('/test', function () {
    // return response()->json([
    //     'name' => 'my image collection',
    //     'items' => [
    //         ['name' => 'item 1', 'price' => 2, 'weight' => 3, 'damage' => 10],
    //         ['name' => 'item 2', 'price' => 2, 'weight' => 3, 'treatment' => 1],
    //         ['name' => 'item 3', 'price' => 2, 'weight' => 3, 'damage' => 2],
    //         ['name' => 'item 4', 'price' => 2, 'weight' => 3, 'treatment' => 5],
    //         ['name' => 'item 5', 'price' => 2, 'weight' => 3, 'damage' => 1],
    //     ]
    // ]);

    return response()->json([
        'name' => [
            'firstName' => 'Chinh',
            'lastName' => 'Do'
        ],

        'age' => 22,
        'favorites' => [
            ['type' => 'sport', 'name' => 'badminton'],
            ['type' => 'music', 'name' => 'red music'],
            ['type' => 'film', 'name' => 'horror film']
        ]
    ]);
});

Route::group(['prefix' => 'plan'], function () {
    Route::get('/', [PlanController::class, 'getPlans']);
    Route::get('/hint/{age}/{sex}/{bmi}', [PlanController::class, 'getPlansByHint']);
    Route::get('/{plan:id}', [PlanController::class, 'getPlan']);
    Route::post('/', [PlanController::class, 'addPlan']);
    Route::put('/{plan:id}', [PlanController::class, 'updatePlan']);
});

Route::group(['prefix' => 'workout'], function () {
    Route::get('/', [WorkoutController::class, 'getWorkouts']);
    Route::get('/{workout:id}', [WorkoutController::class, 'getWorkout']);
    Route::post('/', [WorkoutController::class, 'addWorkout']);
    Route::put('/{workout:id}', [WorkoutController::class, 'updateWorkout']);
});

Route::group(['prefix' => 'exercise'], function() {
    Route::get('/', [ExerciseController::class, 'getExercises']);
    Route::get('/{exercise:id}', [ExerciseController::class, 'getExercise']);
    Route::post('/', [ExerciseController::class, 'addExercise']);
    Route::put('/{exercise:id}', [ExerciseController::class, 'updateExercise']);
});