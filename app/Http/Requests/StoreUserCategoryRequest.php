<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    //@todo: change the rules: 'user id field is required'
    public function rules(): array
    {
        return [
            'user_id' => 'integer|exists:users,id',
            'name' => 'required|unique:user_categories|string|min:1|max:20'
        ];
    }
}
