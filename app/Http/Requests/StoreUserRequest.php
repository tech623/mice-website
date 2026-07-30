<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('user-create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "first_name" => 'required|string',
            "last_name" => 'required|string',
            "contact" => 'required|numeric||regex:/^[0-9]{10,15}$/',
            "email" => 'required|email|unique:users,email,NULL,id,deleted_at,NULL',
        ];
    }
}
