<?php

namespace App\Rules;

class OrderValidationRules
{
    /**
     * Get validation rules for creating an order
     */
    public static function store(): array
    {
        return [
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'total' => 'required|numeric|min:0',
            'status' => 'required|string|in:pending,processing,completed,cancelled',
        ];
    }

    /**
     * Get validation rules for updating an order
     */
    public static function update(): array
    {
        return [
            'customer_name' => 'sometimes|string|max:255',
            'customer_email' => 'sometimes|email|max:255',
            'total' => 'sometimes|numeric|min:0',
            'status' => 'sometimes|string|in:pending,processing,completed,cancelled',
        ];
    }

    /**
     * Get custom validation messages
     */
    public static function messages(): array
    {
        return [
            'customer_name.required' => 'El nombre del cliente es obligatorio.',
            'customer_name.string' => 'El nombre debe ser texto.',
            'customer_name.max' => 'El nombre no puede tener más de 255 caracteres.',
            
            'customer_email.required' => 'El email del cliente es obligatorio.',
            'customer_email.email' => 'El email debe tener un formato válido.',
            'customer_email.max' => 'El email no puede tener más de 255 caracteres.',
            
            'total.required' => 'El total es obligatorio.',
            'total.numeric' => 'El total debe ser un número.',
            'total.min' => 'El total debe ser mayor a 0.',
            
            'status.required' => 'El estado es obligatorio.',
            'status.string' => 'El estado debe ser texto.',
            'status.in' => 'El estado debe ser: pending, processing, completed o cancelled.',
        ];
    }
} 