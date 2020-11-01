<?php

namespace App\Http\Requests;

use App\Http\Responses\SimpleResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ExerciseRequest extends FormRequest {
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
            'name' => 'required',
            'count_type' => 'required',
            'duration' => 'required|numeric',
            'tutorial' => 'nullable',
            'calories' => 'required|numeric',
            'difficulty' => 'required|numeric',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'EXERCISE.NAME.REQUIRED',
            'count_type.required' => 'EXERCISE.COUNT_TYPE.REQUIRED',
            'duration.required' => 'EXERCISE.DURATION.REQUIRED',
            'duration.numeric' => 'EXERCISE.DURATION.INVALID',
            'calories.required' => 'EXERCISE.CALORIES.REQUIRED',
            'calories.numeric' => 'EXERCISE.CALORIES.INVALID',
            'difficulty.required' => 'EXERCISE.DIFFICULTY.REQUIRED',
            'difficulty.numeric' => 'EXERCISE.DIFFICULTY.INVALID',
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(SimpleResponse::error($validator->errors()));
    }
}
