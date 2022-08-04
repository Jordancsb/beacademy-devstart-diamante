<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressControllerRequest extends FormRequest
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
            'postcode' => 'required|min:8|max:8',
            'street' => 'required|string',
            'number' => 'required',
            'neighborhood' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
        ];
    }
}
