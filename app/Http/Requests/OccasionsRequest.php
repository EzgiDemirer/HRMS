<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OccasionsRequest extends FormRequest
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
            'name' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'days_counter' => 'required|numeric',
            'active' => 'required'
        ];
    }

    public function messages(): array
    {
        return [

            'name.required' => 'Occasion name is required',

            'from_date.required' => 'Start date is required',

            'to_date.required' => 'End date is required',

            //'to_date.gt' => 'End date must be greater than or equal to start date',

            'days_counter.required' => 'Number of days is required',

            'days_counter.numeric' => 'Number of days must be numeric',

            'active.required' => 'Activation status is required'

        ];
    }
}