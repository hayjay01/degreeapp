<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name' => 'required',
            'matric_number' => 'required|unique:students',
            'department' => 'required',
            'session' => 'required',
            'email' => 'required|unique:students',
            'phone_number' => 'required|unique:students',
        ];
    }
}
