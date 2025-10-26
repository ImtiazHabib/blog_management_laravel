<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            "name" => ['required'],
            "email" => ['required','email'],
            "password" => ['required','min:4'],
        ];
    }

    public function messages(){
        return [
              "name.required" => "Name Must ditei hobe",
              "password.required" => "Password Chara hobe na ",
              "email.email" => "email type hote hobe ",
        ];
    }
}
