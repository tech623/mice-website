<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateSupervisorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('supervisor-edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $inputArray = $this->request->all();

        return [
            "first_name" => 'required|string',
            "last_name" => 'required|string',
            "contact" => 'required|numeric|digits:10',
            "email" => "required|email|unique:users,id,".$inputArray['id'],
        ];
    }
}
