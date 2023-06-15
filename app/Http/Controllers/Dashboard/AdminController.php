<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewLogin()
    {
        return view('dashboard.auth.login');
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email|exists:admins,email',
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
            if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('home.index');
            } else {
                return back()->withInput()->withErrors(['email' => 'email or password is not true']);
            }
        }

    }

    public function adminLogout(Request $request)
    {
        auth()->guard('admin')->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return back();
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
