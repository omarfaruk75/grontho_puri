<?php

namespace App\Http\Requests\HeaderCard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
           'title' => 'required|max:60',
           'short_details' => 'required|max:150'
        ];
    }

    public function messages()
    {
        return [
         'required'=>"The :attribute filled is required"
        ];
    }   
}
