<?php

namespace App\Http\Requests\Patients;
use Illuminate\Foundation\Http\FormRequest;

class CreatePatientsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'age' => 'required',
            'phone' => 'required',
        ];
    }

}