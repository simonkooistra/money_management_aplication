<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserSavingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *///   @todo: validation for all store and update

    public function authorize(): bool
    {
      return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:user_categories,id|alpha:ascii',
            'name' => 'required|string|max:20|alpha:ascii',
            'description' => 'nullable|string|max:200',
            'total_amount' => 'required|numeric|min:0.01',
        ];
    }
}
