<?php

namespace App\Http\Controllers\Saas;

use App\Http\Controllers\Controller;
use App\Models\Adminrole;
use Illuminate\Http\Request;

class AdminroleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Adminrole::get();

        return view('saas.country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('saas.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Adminrole::create($request->all());

        return redirect(route('country.index'));
    }

    public function status($id, $status)
    {
        $doctor = Adminrole::findOrFail($id);
        $doctor->update(['status' => $status]);

        return response()->json(['msg' => 'done']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $country = Adminrole::findOrFail($id);

        return view('saas.country.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *        return redirect(route('doctor.index'));.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Adminrole::findOrFail($id);
        $doctor->delete();

        return redirect(route('country.index'));
    }

    public function update(Request $request, Adminrole $country)
    {
        $country->update([
            'name' => $request->name,
        ]);

        return redirect(route('country.index'));
    }
}
