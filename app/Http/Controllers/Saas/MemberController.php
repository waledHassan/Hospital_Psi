<?php

namespace App\Http\Controllers\Saas;

use App\Http\Controllers\Controller;
use App\Models\Admingroup;
// use App\Http\Requests\AdminRequest;
use App\Models\User as Admin;
use App\Models\Country;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Admin::get();

        return view('saas.member.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Admingroup::whereNull('company_id')->get();
        return view('saas.member.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->admingroup_id == 'null') {
            return back()->withInput()->withErrors('please select the role');
        }
        $request->merge([
            'password' => bcrypt($request->password),
        ]);
        $member = Admin::create($request->all());
        return redirect()->route('saas.member.index');
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
        $roles = Admingroup::whereNull('company_id')->get();

        return view('saas.member.edit', compact('member', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $member = Admin::findOrFail($id);
        if ($request->admingroup_id == 'null') {
            $request['admingroup_id'] = $member->admingroup_id;
        }

        if ($request->password) {
            $request->merge([
                'password' => bcrypt($request->password),
            ]);
        }
        $member->update($request->all());
        return redirect()->route('saas.member.index');
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
        return redirect()->route('saas.member.index');
    }
}
