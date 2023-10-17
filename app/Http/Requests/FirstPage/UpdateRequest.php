<?php

namespace App\Http\Requests\FirstPage;

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
           'text'=> 'required|max:2650',
           'short_text' => 'required|max:260'
        ];
    }
    public function messages()
    {
        return [
        'required'=> " The: attribute filled is required"
        ];
    }
}
