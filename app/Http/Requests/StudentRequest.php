<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'surname' => 'required',
            'age' => 'required|integer',
            'email' => 'required|email|max:254|unique:students',
            'phone' => 'required',
            'address' => 'required',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
