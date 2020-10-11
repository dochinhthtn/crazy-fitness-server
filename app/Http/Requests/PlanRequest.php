<?php

namespace App\Http\Requests;

use App\Http\Responses\SimpleResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PlanRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'info' => 'required',
            'info.name' => 'required',

            'dates' => 'required|array',
            'dates.*.id' => 'nullable|exists:dates,id',
            'dates.*.order' => 'numeric|distinct',
            'dates.*.workout_id' => 'required|exists:workouts,id',
            'dates.*.meal_id' => 'required|exists:meals,id',
        ];
    }

    public function messages() {
        return [
            'info.required' => 'PLAN.INFO.REQUIRED',
            'info.name.required' => 'PLAN.INFO.NAME.REQUIRED',
            'dates.required' => 'PLAN.DATES.REQUIRED'
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(SimpleResponse::error($validator->errors()));
    }
}
