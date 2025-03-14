<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'image' => ['mimes:png,jpg'],
            'category_id' => ['required', 'exists:categories,id'],
            'description' => ['required'],
        ];
    }

    public function attributes()
    {
        return [

            'category_id' => 'category',
        ];
    }
}
