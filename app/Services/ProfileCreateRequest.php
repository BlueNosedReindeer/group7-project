<?php

namespace App\Services;

use App\Http\Requests\ProfileRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class ProfileCreateRequest extends ProfileRequest
{
    /**
     * Get the validation rules that apply to the request
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|string|min:3|max:15|unique:profiles,username',
            'password' => 'required|string|min:8|max:20',
            'name' => 'nullable|string|max:50',
            'email' => 'nullable|string|email|max:255|unique:profiles,email',
            'address' => 'nullable|string|max:255',
            'home_address' => 'nullable|string|max:255'
        ];
    }
}
