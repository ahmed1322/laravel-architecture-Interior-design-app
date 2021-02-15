<?php

namespace App\Http\Requests\Dashboard\Roles;

use Illuminate\Foundation\Http\FormRequest;

class CreateRolesRequest extends FormRequest
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
            'name' => 'required|unique:roles|max:255'
        ];
    }


    public function messages(Type $var = null)
    {
        return [
            'name.required' => 'Role Name is Required',
            'name.unique' => 'Role Name is Exist',
            'name.max' => 'Role Name must be 255 caracherts'
        ];
    }
}
