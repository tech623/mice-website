<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
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
            'property_title' => ['required', 'string'],
            'address' => ['required', 'string'],
            'total_rooms' => ['required', 'numeric'],
            'description' => 'required',
            'star' => ['required', 'numeric'],
            'location' => ['required', 'string'],
            'region' => ['required', 'string'],
            'img_path' => 'required|mimes:jpg,jpeg,png|max:2048',
            'status'  => 'required',
            'show_on_home_page'  => 'required',
            'property_service' => 'required'
        ];
    }
}
