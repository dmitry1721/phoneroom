<?php

namespace App\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|nullable|max:255|injection',
            'image' => 'nullable|file|injection',
            'categories_id' => 'array|nullable|injection'
        ];
    }
}
