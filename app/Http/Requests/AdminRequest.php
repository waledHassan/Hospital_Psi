<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:admins,email',
            'mobile_no' => 'required|string|max:255|unique:admins,mobile_no',
            'city_id' => 'required',
            'address'=>'required',
            'title'=>'required|in:Mr,Ms,Mrs,M/s',
            'country_id' => 'required',
            'admingroup_id' => 'required',
            'username'=>'required|unique:admins,username',
            'password'=>'required|min:8|confirmed',
            'postal_code'=>'required',
        ];

        if( in_array("PUT", request()->route()->methods) ){
            $rules['email'] = ['required','email','unique:admins,email,'.$this->route('member')  ??''];
            $rules['mobile_no'] = ['required','numeric','unique:admins,mobile_no,'.$this->route('member')  ??''];
            $rules['username'] = ['required','unique:admins,username,'.$this->route('member')  ??''];
            $rules['password'] = ['nullable','min:8'];
        }

        return $rules;
    }
}
