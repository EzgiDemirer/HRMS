<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentsRequest extends FormRequest
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
           'phones' => 'required',
           'active' => 'required'
        ];
    }

    public function messages(): array
    {
        return [

          'name.required' => 'Department name is required',
          'phones.required' => 'Department phone is required',
          'active.required' => 'Department activation status is required',

        ];
    }

}