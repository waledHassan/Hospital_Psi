<?php

namespace App\Http\Controllers\Saas;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;



class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $patient_m = 11;
        $patient_f = 11;
        $results['first'] = 10;
        $results['second'] = 10;
        $results['third'] = 10;
        $results['four'] = 10;
        $results['five'] = 10;

        $patient['Jan'] = 10;
        $patient['Feb'] = 10;
        $patient['Mar'] = 10;
        $patient['Apr'] = 10;
        $patient['May'] = 10;
        $patient['Jun'] = 10;
        $patient['Jul'] = 10;
        $patient['Aug'] = 10;
        $patient['Oct'] = 10;
        $patient['Nov'] = 10;
        $patient['Dec'] = 10;

        return view('saas.home', compact('patient_m', 'patient_f', 'results', 'patient'));
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
