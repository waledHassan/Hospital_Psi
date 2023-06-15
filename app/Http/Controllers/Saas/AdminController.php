<?php

namespace App\Http\Controllers\Saas;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewLogin()
    {
        return view('saas.auth.login');
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ];

        $message = [
            'email.required' => 'email is required',
            'email.email' => 'please enter a valid email',
            'email.exists' => 'this email is not exist',
            'password.required' => 'password is required',
        ];

        $data = validator()->make($request->all(), $rules, $message);

        if ($data->fails()) {
            return back()->withInput()->withErrors($data->errors());
        } else {
            if (auth()->guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {

                return redirect()->route('saas.home.index');
            } else {

                return back()->withInput()->withErrors(['email' => 'email or password is not true']);
            }
        }
    }

    public function adminLogout(Request $request)
    {
        auth()->guard('web')->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect()->route('saas.login');
    }

    public function changePasswordView(){
        return view('saas.auth.change_password');
    }
    public function changePassword(Request $request){
        $rules = [
            'old_password'=>'required',
            'password' => 'confirmed|required',

        ];
        $data = validator()->make($request->all(), $rules);

        if ($data->fails()) {
            session()->flash('error', $data->errors()->first());
            return back();
        }

        $user = auth()->user();
        $hashedPassword =$user->password;

        if (\Hash::check($request->old_password, $hashedPassword)) {
            if (!\Hash::check($request->password, $hashedPassword)) {
                $newpassword = bcrypt($request->password);
                $user->update(['password' =>  $newpassword]);

                return redirect()->route('saas.logout');
            } else {
                session()->flash('error', 'new password can not be the old password!');
                return back();
            }
        } else {
            session()->flash('error', 'old password doesnt matched !');
            return back();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
    }
}
