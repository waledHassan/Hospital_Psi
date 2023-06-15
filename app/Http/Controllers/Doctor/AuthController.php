<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public $model;

    public function __construct()
    {
        $this->model = new Doctor();
    }

    public function login(Request $request)
    {
        $rules =
            [
                'email' => 'required',
                'password' => 'required',

            ];
        $data = validator()->make($request->all(), $rules);

        if ($data->fails()) {

            return $this->responseJson(0, $data->errors()->first());
        }
        $doctor = $this->model->where(['email' => $request->email])->first();
        if ($doctor) {

            if (\Hash::check($request->password, $doctor->password)) {
                $token = $doctor->createToken('android')->accessToken;

                return $this->responseJson(1, 'تم تسجيل الدخول بنجاح', [
                    'token' => $token,
                    "id"                  => $doctor->id,
                    "first_name"          => $doctor->first_name,
                    "second_name"         => $doctor->second_name,
                    "last_name"           => $doctor->last_name,
                    "email"               => $doctor->email,
                    "profile_image"       => $doctor->profile_image,
                    "mobile_no"           => $doctor->mobile_no,
                    "dob"                 => $doctor->dob,
                    "gender"              => $doctor->gender,
                    "status"              => $doctor->status,
                    "register_date"       => $doctor->register_date


                ]);
            } else {

                return $this->responseJson(0, 'كلمة المرور غير صحيحة');
            }
        } else {
            return $this->responseJson(0, 'البريد  الذي أدخلته غير صحيح');
        }

        // send pin code to confirm phone
    }
}
