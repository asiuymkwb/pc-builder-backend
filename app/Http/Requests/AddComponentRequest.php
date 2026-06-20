<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddComponentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'component_id' => ['required', 'integer', 'exists:components,id'],
            'quantity'     => ['sometimes', 'integer', 'min:1', 'max:10'],
        ];
    }
}
