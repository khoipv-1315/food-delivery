<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodForm extends FormRequest
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
            'name' => 'required|unique:foods',
            'price' => 'required|numeric',
            'description' => 'required|min:6|max:1000',
            'image' => 'required'
        ];
    }
}
