<?php

use App\Http\Controllers\API\PlanController;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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
    // Plan::create(['id' => 1000, 'name' => 'my first plan']);

    // $plan = Plan::find(1);
    // $plan->update(['name' => 'hahaha']);
});

Route::group(['prefix' => 'plan'], function () {
    Route::get('/', [PlanController::class, 'getPlans']);
    Route::get('/hint/{age}/{sex}/{bmi}', [PlanController::class, 'getPlansByHint']);
    Route::post('/', [PlanController::class, 'addPlan']);
    Route::put('/{plan:id}', [PlanController::class, 'updatePlan']);
});



