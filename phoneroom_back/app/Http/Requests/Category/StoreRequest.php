<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'string|required|max:255|injection',
            'image' => 'nullable|file|injection',
            'parent_id' => 'nullable|int|injection',
            'brands_id' => 'array|nullable|injection'
        ];
    }
}
