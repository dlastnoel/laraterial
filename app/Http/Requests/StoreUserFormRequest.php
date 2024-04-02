<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required|string',
            'middlename' => 'nullable|string',
            'lastname' => 'required|string',
            'name_extension' => 'nullable|string',
            'contact_no' => 'required|string|unique:users,contact_no',
            'role' => 'required|string',
            'status' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
