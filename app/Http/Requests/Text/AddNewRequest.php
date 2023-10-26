<?php

namespace App\Http\Requests\Text;

use Illuminate\Foundation\Http\FormRequest;

class AddNewRequest extends FormRequest
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
          'category'=>'required|max:60',
          'short_texts'=> 'required|max:500'
        ];
    }
    public function messages()
    {
        return [
         'required'=> " The : attribute filled is required"
        ];
    }
}
