<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'string|min:3|max:15|unique:profiles,username',
            'password' => 'string|min:8|max:20',
            'name' => 'nullable|string|max:50',
            'email' => 'nullable|string|email|max:255|unique:profiles,email',
            'address' => 'nullable|string|max:255',
            'home_address' => 'nullable|string|max:255'
        ];
    }

}
