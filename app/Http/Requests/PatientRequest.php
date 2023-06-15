<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
        $rules= [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:patients,email',
            'mobile_no' => 'required|string|max:255|unique:patients,mobile_no',
            'city_id' => 'required',
            'country_id' => 'required',
            'medical_no'=>'required|string|max:255',
            'dob'=>"required",
            'gender'=>'required|in:male,female',
        ];

        if( in_array("PUT", request()->route()->methods) ){
            $rules['email'] = ['required','email','unique:patients,email,'.$this->route('patient')  ??''];
            $rules['mobile_no'] = ['required','numeric','unique:patients,mobile_no,'.$this->route('patient')  ??''];
        }

        return $rules;
    }
}
