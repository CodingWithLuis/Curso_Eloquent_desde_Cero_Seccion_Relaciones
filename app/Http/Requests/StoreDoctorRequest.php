<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
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
            'name' => [
                'required',
                'max:255',
            ],
            'email' => [
                'required',
                'unique:doctors,email',
                'max:255',
            ],
            'phone' => [
                'required',
                'max:255',
            ],
            'hospital_id' => [
                'required',
            ],
            'specialties.*' => [
                'integer'
            ],
            'specialties' => [
                'array',
                'required'
            ]
        ];
    }
}
