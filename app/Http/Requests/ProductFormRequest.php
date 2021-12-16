<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
        $rules = [
            'category_id' => 'required|numeric',
            'code' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'brief_description_ar' => 'required',
            'brief_description_en' => 'required',
            'price' => 'required',
            'discount' => 'numeric|nullable',
        ];

        $custom = ['main_image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'];

        if ($this->method() == "POST") { $rules['main_image'] = 'mimes:jpeg,jpg,png,gif|required|max:10000'; }
        
        return $rules;
    }
}