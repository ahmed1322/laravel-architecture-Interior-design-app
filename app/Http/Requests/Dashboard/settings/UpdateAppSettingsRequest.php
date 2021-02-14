<?php

namespace App\Http\Requests\Dashboard\settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppSettingsRequest extends FormRequest
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
            'site_name' => 'required|max:255',
            'site_email' => 'required|max:255',
            'site_logo_light' => 'mimes:jpeg,jpg,png,svg',
            'site_logo_dark' => 'mimes:jpeg,jpg,png,svg',
            'site_phone' => 'required',
            'site_location' => 'required',
        ];
    }
}
