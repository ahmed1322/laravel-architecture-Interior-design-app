<?php

namespace App\Http\Requests\Dashboard\Roles;
use App\Models\Role;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRolesRequest extends FormRequest
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
            'name' => 'required|unique:roles,name,'.$this->id.'|max:255',
            'post_roles' => 'array',
            "category_roles" => 'array',
            "tag_roles" => 'array',
        ];
    }
}
