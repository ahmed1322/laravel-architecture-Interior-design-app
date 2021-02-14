<?php

namespace App\Http\Requests\Dashboard\Site\Testimonial;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTestimonialRequest extends FormRequest
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
            'name' => 'required|unique:testimonials,name,'.$this->id.'|max:255',
            'content' => 'required|string',
            'details' => 'required|string',
        ];
    }

}
