<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\Country;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Admin::whereCompanyId(auth()->user()->company_id)->get();

        return view('dashboard.member.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('dashboard.member.create', compact('countries'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $request->merge([
            'company_id' => auth()->user()->company_id,
            'password' => bcrypt($request->password),
        ]);
        $member = Admin::create($request->all());
        return redirect()->route('member.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Admin::findOrFail($id);
        // return view('dashboard.patient.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Admin::findOrFail($id);
        $countries = Country::all();
        return view('dashboard.member.edit', compact('member', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, $id)
    {
        $member = Admin::findOrFail($id);
        if ($request->password) {
            $request->merge([
                'password' => bcrypt($request->password),
            ]);
        }
        $member->update($request->all());
        return redirect()->route('member.index');
    }
    public function status($id, $status)
    {
        $member = Admin::findOrFail($id);
        $member->update(['active' => $status]);

        return response()->json(['msg' => 'done']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $member = Admin::findOrFail($id);
        $member->delete();
        return redirect()->route('member.index');
    }
}
