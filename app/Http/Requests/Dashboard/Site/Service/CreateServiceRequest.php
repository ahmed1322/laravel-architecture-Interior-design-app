<?php

namespace App\Http\Requests\Dashboard\Site\Service;

use Illuminate\Foundation\Http\FormRequest;

class CreateServiceRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:services,title|max:255',
            'description' => 'required|string',
            'excerpt' => 'string',
            'icon' => 'required|string',
            'image' => 'mimes:jpeg,jpg,png',
            'visible' => 'integer|in:1,0'
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
            'icon.required' => 'Please Choose a Icon',
            'visible.integer' => 'Silly You, can`t beat me :(, make it integer again',
            'visible.in' => 'Silly You, can`t beat me :(, Just 1 OR 0 ONLY',
            // 'excerpt.string' => 'ONLY Text Accepted',
        ];
    }
}
