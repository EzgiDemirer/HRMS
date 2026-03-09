<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Finance_calenders_Request extends FormRequest
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
        'FINANCE_YR' => 'required|unique:finance_calenders',
        'FINANCE_YR_DESC' => 'required',
        'start_date' => 'required',
        'end_date' => 'required|gt:start_date'
        ];
    }

    public function messages(): array
    {
        return [

     'FINANCE_YR.required' => 'Financial year code is required',
     'FINANCE_YR.unique' => 'Financial year code already exists',

     'FINANCE_YR_DESC.required' => 'Financial year description is required',

     'start_date.required' => 'Financial year start date is required',

     'end_date.required' => 'Financial year end date is required',
     'end_date.gt' => 'End date must be greater than start date'

        ];
    }
}