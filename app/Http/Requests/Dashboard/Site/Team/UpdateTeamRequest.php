<?php

namespace App\Http\Requests\Dashboard\Site\Team;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeamRequest extends FormRequest
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
            'name' => 'required|unique:teams,name,'.$this->id.'|max:255',
            'role' => 'required',
            'image' => 'mimes:jpeg,jpg,png'
        ];
    }
}
