<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Doctor;
use App\Services\PerService;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;

class DoctorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = ((new PerService())->getPermissions());
        if (!in_array("doctor", $permissions)) {
            return redirect()->route('home.index');
        }
        
        $doctors = Doctor::whereCompanyId(auth()->user()->company_id)->get();

        return view('dashboard.doctor.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = ((new PerService())->getPermissions());
        if (!in_array("add_doctor", $permissions)) {
            return redirect()->route('home.index');
        }
        return view('dashboard.doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorRequest $request)
    {
        $request->merge([
            'company_id' => auth()->user()->company_id,
            'password' => bcrypt($request->password),
        ]);
        $doctor = Doctor::create($request->all());

        return redirect(route('doctor.index'));
    }

    public function status($id, $status)
    {
        $permissions = ((new PerService())->getPermissions());
        if (!in_array("doctor_edit", $permissions)) {
            return response()->json(['msg' => 'done']);
        }
        $doctor = Doctor::findOrFail($id);
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
        $permissions = ((new PerService())->getPermissions());
        if (!in_array("doctor_edit", $permissions)) {
            return redirect()->route('home.index');
        }
        $doctor = Doctor::findOrFail($id);

        return view('dashboard.doctor.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *        return redirect(route('doctor.index'));.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permissions = ((new PerService())->getPermissions());
        if (!in_array("doctor_delete", $permissions)) {
            return redirect()->route('home.index');
        }
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect(route('doctor.index'));
    }

    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        $doctor->update([
            'first_name' => $request->first_name,
            'second_name' => $request->second_name,
            'last_name' => $request->last_name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
        ]);

        return redirect(route('doctor.index'));
    }
}
