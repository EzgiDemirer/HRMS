<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrachesRequest extends FormRequest
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
         'address' => 'required',
         'active' => 'required'
        ];
    }

    public function messages(): array
    {
        return [

       'name.required' => 'Branch name is required',
       'phones.required' => 'Branch phone is required',
       'address.required' => 'Branch address is required',
       'active.required' => 'Branch activation status is required',

        ];
    }
}