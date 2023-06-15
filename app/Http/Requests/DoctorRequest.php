<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'first_name' => 'required',
            'second_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:doctors',
            'password' => 'required|confirmed|min:6',
            'mobile_no' => 'required|numeric|regex:/^01[0-2,5]\d{8}$/|unique:doctors',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'البريد الالكتروني مطلوب',
            'email.email' => 'صيغة البريد الالكتروني غير صحيحة',
            'email.unique' => 'هذا البريد الالكتروني مستخدم من قبل',
            'mobile_no.required' => 'رقم الموبايل مطلوب',
            'mobile_no.numeric' => 'صيغة رقم الموبايل غير صحيحة يجب ان تكون ارقام',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min' => 'الحد الادني لكلمه المرور 6 حروف',
            'password.confirmed' => 'كلمه المرور غير متطابقه',
            'mobile_no.required' => 'رقم الموبايل مطلوب',
            'mobile_no.numeric' => 'صيغة رقم الموبايل غير صحيحة يجب ان تكون ارقام',
            'mobile_no.regex' => 'صيغة رقم الهاتف غير صحيحة, قم بحذف (2+) من رقم الهاتف',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $validator->validated();
    }
}
