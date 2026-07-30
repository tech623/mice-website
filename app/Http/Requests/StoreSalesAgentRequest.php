<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreSalesAgentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('salesagent-create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $validateArr =  [
            "first_name" => 'required|string',
            "last_name" => 'required|string',
            "contact" => 'required|numeric|digits:10',
            "email" => 'required|email|unique:users,email',
        ];

        if (auth()->user()->can("is_admin")) {
            $validateArr = array_merge($validateArr , ["supervisor" => "required"]);
        }

        return $validateArr;
    }
}
