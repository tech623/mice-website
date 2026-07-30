<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'blog_title' => ['required', 'string'],
            'blog_slug' => 'required|regex:/^[a-zA-Z0-9-]+$/',
            'banner_image' => 'required|image|max:2048',
            'thumbnail_description' => 'required',
            'full_description' => 'required',
            'author' => 'required|string',
            'date'  => 'required'
        ];
    }
    public function messages(): array
    {
        $errorMessages = [
            'blog_slug.regex' => "The letter contain only dashes.",
            'banner_image.max' => "The :attribute may not be greater than 2Mb."
        ];
        return $errorMessages;
    }
}
