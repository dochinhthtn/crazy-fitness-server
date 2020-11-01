<?php

namespace App\Http\Requests;

use App\Http\Responses\SimpleResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class WorkoutRequest extends FormRequest {
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
            'info.description' => 'required',

            'exercises' => 'nullable|array',
            'exercises.*.id' => 'required|exists:exercises,id',
            'exercises.*.order' => 'required|numeric|distinct',
            'exercises.*.counter' => 'required|numeric'
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(SimpleResponse::error($validator->errors()));
    }
}
