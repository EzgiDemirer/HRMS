<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShiftTypesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'type' => 'required',
            'from_time' => 'required',
            'to_time' => 'required',
            'total_hour' => 'required',
            'active' => 'required'
        ];
    }

    public function messages(): array
    {
        return [

            'type.required' => 'Shift type is required',

            'from_time.required' => 'Start time is required',

            'to_time.required' => 'End time is required',

            'total_hour.required' => 'Total hours field is required',

            'active.required' => 'Activation status is required',

        ];
    }
}