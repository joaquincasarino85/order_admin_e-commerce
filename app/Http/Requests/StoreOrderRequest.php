<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\OrderValidationRules;

class StoreOrderRequest extends FormRequest
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
        return OrderValidationRules::store();
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return OrderValidationRules::messages();
    }
}
