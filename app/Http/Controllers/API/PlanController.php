<?php

namespace App\Http\Controllers\API;

use App\Editor\PlanEditor;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlanRequest;
use App\Http\Resources\PlanResource;
use App\Http\Responses\SimpleResponse;
use App\Models\Plan;

class PlanController extends Controller {
    //

    public function getPlans() {
        return PlanResource::collection(Plan::with('dates')->paginate(8));
        // return PlanResource::collection(Plan::paginate(8));
    }

    public function getPlansByHints(int $age, string $sex, float $bmi) {
        return "";
    }

    public function getPlan(Plan $plan) {
        return new PlanResource($plan->load('dates'));
    }

    public function searchPlans(string $keyword) {
        return PlanResource::collection(Plan::whereRaw("name LIKE '%$keyword%'")->with('dates')->paginate(8));
    }

    public function addPlan(PlanRequest $planRequest) {
        $planEditor = PlanEditor::open();
        $planEditor->saveWithData($planRequest->all());

        return SimpleResponse::success(['message' => 'PLAN.ADDED.SUCCESS']);
    }

    public function updatePlan(PlanRequest $planRequest, Plan $plan) {
        $planEditor = PlanEditor::open($plan);
        $planEditor->saveWithData($planRequest->all());

        return SimpleResponse::success(['message' => 'PLAN.UPDATED.SUCCESS']);
    }

    public function deletePlan(Plan $plan) {
        $plan->delete();

        return SimpleResponse::success(['message' => 'PLAN.DELETED.SUCCESS']);
    }
}
