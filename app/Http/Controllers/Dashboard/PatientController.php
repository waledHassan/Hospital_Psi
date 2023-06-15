<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Models\Country;
use App\Models\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::whereCompanyId(auth()->user()->company_id)->get();

        return view('dashboard.patient.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();

        return view('dashboard.patient.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {
        $request->merge([
            'company_id' => auth()->user()->company_id,
            'members_no' => 0,
            'status' => 1,
            'register_date' => date('Y-m-d'),
        ]);
        $patient = Patient::create($request->all());

        return redirect()->route('patient.index');
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
        $patient = Patient::findOrFail($id);
        // return view('dashboard.patient.show', compact('patient'));
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
        $patient = Patient::findOrFail($id);
        $countries = Country::all();

        return view('dashboard.patient.edit', compact('patient', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PatientRequest $request, $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->update($request->all());

        return redirect()->route('patient.index');
    }

    public function status($id, $status)
    {
        $patient = Patient::findOrFail($id);
        $patient->update(['status' => $status]);

        return response()->json(['msg' => 'done']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('patient.index');
    }
}
