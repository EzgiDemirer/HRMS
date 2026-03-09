<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Admin_panel_settingRequest extends FormRequest
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
           'company_name'=>'required',
           'phones'=>'required',
           'address'=>'required',
           'after_miniute_calculate_delay'=>'required',
           'after_miniute_calculate_early_departure'=>'required',
           'after_miniute_quarterday'=>'required',
           'after_time_half_daycut'=>'required',
           'after_time_allday_daycut'=>'required',
           'monthly_vacation_balance'=>'required',
           'after_days_begin_vacation'=>'required',
           'first_balance_begin_vacation'=>'required',
           'sanctions_value_first_abcence'=>'required',
           'sanctions_value_second_abcence'=>'required',
           'sanctions_value_thaird_abcence'=>'required',
           'sanctions_value_forth_abcence'=>'required',
        ];
    }

    public function messages(): array
    {
        return [

       'company_name.required'=>'Company name is required',
       'phones.required'=>'Company phone is required',
       'address.required'=>'Company address is required',

       'after_miniute_calculate_delay.required'=>'Delay calculation time is required',
       'after_miniute_calculate_early_departure.required'=>'Early departure calculation time is required',

       'after_miniute_quarterday.required'=>'Quarter day deduction delay minutes is required',

       'after_time_half_daycut.required'=>'Half day deduction after number of delays is required',

       'after_time_allday_daycut.required'=>'Full day deduction after number of delays is required',

       'monthly_vacation_balance.required'=>'Monthly vacation balance is required',

       'after_days_begin_vacation.required'=>'Vacation balance start days is required',

       'first_balance_begin_vacation.required'=>'Initial vacation balance is required',

       'sanctions_value_first_abcence.required'=>'First absence penalty value is required',

       'sanctions_value_second_abcence.required'=>'Second absence penalty value is required',

       'sanctions_value_thaird_abcence.required'=>'Third absence penalty value is required',

       'sanctions_value_forth_abcence.required'=>'Fourth absence penalty value is required',

        ];
    }
}