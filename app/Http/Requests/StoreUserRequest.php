<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'role' => 'required',
            'level' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'role.required' => '*Role is required',
            'level.required' => '*Level is required if the role is Student ',
            'firstname.required' => '*Firstname is required',
            'lastname.required' => '*Lastname is required',
            'gender.required' => '*Gender is required',
            'email.required' => '*Email is required',
            'paswword.required' => '*Password is required',
        ];
    }
}
