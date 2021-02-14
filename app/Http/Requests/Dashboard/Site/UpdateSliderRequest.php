<?php

namespace App\Http\Requests\Dashboard\Site;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
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
        // dd($this->all());
        return [
            'title' => 'required|unique:sliders,title,'.$this->id.'|max:255',
            'description' => 'required',
            'category_id' => 'required|integer',
            'portfolio_id' => 'required|integer',
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
            'category_id.required' => 'Please Choose A category',
            'visible.integer' => 'Silly You, can`t beat me :(, make it integer again',
            'visible.in' => 'Silly You, can`t beat me :(, Just 1 OR 0 ONLY',
        ];
    }
}
