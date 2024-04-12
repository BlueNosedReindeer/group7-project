<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreditCardRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'card_number' => 'required|string|max:19|min:13',
            'cardholder_name' => 'required|string|max:255',
            'expiration_date' => 'required|date_format:m/Y|after:today',
            'cvv' => 'required|digits_between:3,4',
        ];
    }
}
