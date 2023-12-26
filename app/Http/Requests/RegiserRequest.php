<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegiserRequest extends FormRequest
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
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'class' => 'required|min:1|max:12',
            'school_id' => 'required|exists:schools,id',
            'email_teachers' => 'required|email'
        ];
    }
}
