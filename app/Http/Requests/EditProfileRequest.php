<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EditProfileRequest extends FormRequest
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
        $id = Auth::user()->id;
        return [
            'name' => 'required|max:30',
            'phone' => 'size:11|unique:users,phone,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'address' => 'string|nullable',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
