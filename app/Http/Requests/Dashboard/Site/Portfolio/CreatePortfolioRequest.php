<?php

namespace App\Http\Requests\Dashboard\Site\Portfolio;

use Illuminate\Foundation\Http\FormRequest;

class CreatePortfolioRequest extends FormRequest
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
            'title' => 'required|unique:portfolios,title,'.$this->id.'|max:255',
            'description' => 'required',
            'category_id' => 'required|integer',
            'image' => 'required|mimes:jpeg,jpg,png',
            'link' => 'required|string',
            'created_at' => 'required|date'
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
            'category_id.integer' => 'Silly You, can`t beat me :(, make it integer again',
            'created_at.required' => 'Project created at DATE required',
            'created_at.date' => 'Project created at msut be in DATE format ex. Y-M-d',
        ];
    }
}
