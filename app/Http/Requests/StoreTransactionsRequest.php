<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "amount" => 'required|integer',
            "cr_dr" =>  'required',
            "allocate" => 'nullable|integer',
            "allocated_for" => 'nullable|string',
            "category" => 'required',
            "type" => 'required',
            "description" => 'string|nullable'
        ];
    }

    public function messages() : array
    {
        return [
            'amount.required' => 'Amount cannot be empty',
            'amount.integer' => 'Field amount must be number',
            'cr_dr.required' => 'Credit/Debit must be filled',
            'allocate.integer' => 'Field allocate must be number',
            'allocate_for.string' => 'Wrong format',
            'type.required' => 'Type must be filled',
            'description.string' => 'Wrong format'
        ];
    }
}
