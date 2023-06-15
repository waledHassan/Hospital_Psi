<?php

namespace App\Http\Controllers\Saas;

use App\Http\Controllers\Controller;
use App\Models\Admingroup;
use App\Models\Adminrole;
use Illuminate\Http\Request;

class AdmingroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Admingroups = Admingroup::where('company_id', null)->get();

        return view('saas.groups.index', compact('Admingroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('saas.groups.create');
    }

    public function status($groupid, $roleid, $status)
    {
        $group = Admingroup::find($groupid)->permissions()->find($roleid);
        $group->pivot->status = $status;
        $group->pivot->save();

        return response()->json(['msg' => 'done']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'company_id' => auth()->user()->company_id,
        ]);
        $group = Admingroup::create($request->all());

        $group->permissions()->attach(Adminrole::get());

        return redirect(route('saas.admingroup.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Admingroup $admingroup)
    {
        return view('saas.groups.show', compact('admingroup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *        return redirect(route('doctor.index'));.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function update(Request $request, Admingroup $country)
    {
    }
}
