<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreMakeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => ['required', 'max:2048'], // 2MB max
            'name' => ['required', 'string', 'max:100', 'exists:makes,name'],
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'An image is required.',
            'image.image' => 'The file must be an image.',
            'image.max' => 'The image must not be larger than 2MB.',
            'name.required' => 'A name is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name must not exceed 100 characters.',
        ];
    }
}
