<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting=Company::first();
        return view('dashboard.setting.setting',compact('setting'));
    }
    public function update(Request $request)
    {
        $img1='';
        $img2='';
        $imgvaf='';

        if( $request->img1){
        $img1 = time().'.'.$request->img1->extension();
        $request->img1->move(public_path('images'), $img1);
    }
        if($request->img2){
        $img2 = time().'.'.$request->img2->extension();
        $request->img2->move(public_path('images'), $img2);
        }
        if($request->imgvaf){
            $imgvaf = time().'.'.$request->imgvaf->extension();
            $request->imgvaf->move(public_path('images'), $imgvaf);
        }

        $setting=Company::first();
        if($setting){
        $setting->update($request->except('img1','img2'));

        }
        else{
            $setting=Company::create($request->all());

        }
        if($img1){
            $setting->update(['img1'=>$img1]);

        }
        if($img2){
            $setting->update(['img2'=>$img2]);

        }
        if($imgvaf){
            $setting->update(['imgvaf'=>$imgvaf]);

        }
        return redirect()->back()->with('success','Setting Updated Successfully');
    }
}
