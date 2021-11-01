<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'address' => 'required',
            'payment-method-id' => 'required',
            'employee-type' => 'required',
            'salary' => 'exclude_unless:employee-type,Salaried|required',
            'base-salary' => 'exclude_unless:employee-type,Commissioned|required',
            'commission-tax' => 'exclude_unless:employee-type,Commissioned|required',
            'hourly-salary' => 'exclude_unless:employee-type,Hourly|required',
            'union-tax' => 'exclude_unless:union,true|required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'payment-method-id.required' => 'Payment method is required',
            'employee-type.required' => 'Employee type is required',
            'salary.required' => 'Salary is required',
            'base-salary.required' => 'Base salary is required',
            'commission-tax.required' => 'Commission tax is required',
            'hourly-salary.required' => 'Hourly salary is required',
            'union-tax.required' => 'Union tax is required',
        ];
    }
}
