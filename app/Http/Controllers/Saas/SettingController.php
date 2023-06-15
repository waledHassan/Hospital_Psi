<?php

namespace App\Http\Controllers\Saas;

use App\Models\Admin;
use App\Models\Company;
use App\Models\Adminrole;
use App\Models\Admingroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        $companies = Company::get();

        return view('saas.setting.index', compact('companies'));
    }

    public function create()
    {
        return view('saas.setting.create');
    }


    public function store(Request $request)
    {
        $img1 = '';
        $img2 = '';
        $imgvaf = '';

        if ($request->img1) {
            $img1 = time() . '.' . $request->img1->extension();
            $request->img1->move(public_path('upload/company'), $img1);
        }
        if ($request->img2) {
            $img2 = time() . '.' . $request->img2->extension();
            $request->img2->move(public_path('upload/company'), $img2);
        }
        if ($request->imgvaf) {
            $imgvaf = time() . '.' . $request->imgvaf->extension();
            $request->imgvaf->move(public_path('upload/company'), $imgvaf);
        }

        $setting = Company::create($request->except('img1', 'img2'));

        if ($img1) {
            $setting->update(['img1' => $img1]);
        }
        if ($img2) {
            $setting->update(['img2' => $img2]);
        }
        if ($imgvaf) {
            $setting->update(['imgvaf' => $imgvaf]);
        }

        $group = Admingroup::create([
            'company_id' => $setting->id,
            'name' => 'supermanager',
        ]);
        $group->permissions()->attach(Adminrole::get());
        Admin::create([
            'username' => $setting->name,
            'password' => bcrypt('123'),
            'fname' => 'admin',
            'lname' => 'admin',
            'email' => 'admin@' . $setting->name . '.com',
            'address' => 'a',
            'title' => 'Mr',
            'active' => 1,
            'mobile_no' => '010' . rand(11111111, 99999999),
            'city_id' => 1,
            'company_id' => $setting->id,
            'country_id' => 1,
            'postal_code' => '1',
            'admingroup_id' => 1
        ]);

        return redirect()->route('saas.setting.index');
    }

    public function edit($id){
        $company = Company::findOrFail($id);
        // dd($company);
        return view('saas.setting.edit',compact('company'));
    }

    public function update(Request $request,$id)
    {
        $img1 = '';
        $img2 = '';
        $imgvaf = '';

        if ($request->img1) {
            $img1 = time() . '.' . $request->img1->extension();
            $request->img1->move(public_path('images'), $img1);
        }
        if ($request->img2) {
            $img2 = time() . '.' . $request->img2->extension();
            $request->img2->move(public_path('images'), $img2);
        }
        if ($request->imgvaf) {
            $imgvaf = time() . '.' . $request->imgvaf->extension();
            $request->imgvaf->move(public_path('images'), $imgvaf);
        }

        $setting = Company::findOrFail($id);
        if ($setting) {
            $setting->update($request->except('img1', 'img2','imgvaf'));
        } else {
            $setting = Company::create($request->all());
        }
        if ($img1) {
            $setting->update(['img1' => $img1]);
        }
        if ($img2) {
            $setting->update(['img2' => $img2]);
        }
        if ($imgvaf) {
            $setting->update(['imgvaf' => $imgvaf]);
        }


        return redirect()->route('saas.home.index')->with('success', 'Setting Updated Successfully');
    }
}
