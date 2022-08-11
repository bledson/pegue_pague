<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|string',
            'holder_id' => 'required|string|unique:App\Models\User,holder_id',
            'email' => 'required|email|unique:App\Models\User,email',
            'password' => 'required',
            'role_id' => 'required|integer'
        ];
    }
}
