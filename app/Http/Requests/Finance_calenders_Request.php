<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Finance_calenders_Request extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'start_date' => $this->convertDate($this->start_date),
            'end_date' => $this->convertDate($this->end_date),
        ]);
    }

    private function convertDate($date): ?string
    {
        if (empty($date)) {
            return null;
        }

        // dd.mm.yyyy -> yyyy-mm-dd
        $parts = explode('.', $date);

        if (count($parts) === 3) {
            return $parts[2] . '-' . $parts[1] . '-' . $parts[0];
        }

        return $date;
    }

    public function rules(): array
    {
        return [
            'FINANCE_YR' => 'required|integer|unique:finance_calenders,FINANCE_YR',
            'FINANCE_YR_DESC' => 'required|string|max:225',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ];
    }

    public function messages(): array
    {
        return [
            'FINANCE_YR.required' => 'Financial year code is required',
            'FINANCE_YR.unique' => 'Financial year code already exists',
            'start_date.required' => 'Start date is required',
            'end_date.required' => 'End date is required',
            'end_date.after' => 'End date must be greater than start date',
        ];
    }
}