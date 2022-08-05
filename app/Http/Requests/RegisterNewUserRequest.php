<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterNewUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'email|required|unique:users,email',
            'phone' => 'required|digits:13',
            'cpf' => 'required|unique:users,cpf',
            'birth_date' => 'required|date',
            'password' => 'required|min:6|max:12'
        ];
    }
}
