<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::whereCompanyId(auth()->user()->company_id)->get();

        return view('dashboard.level.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.level.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $audioname = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('images'), $audioname);
        $level = Level::create([
            'company_id' => auth()->user()->company_id,
            'image_name' => $audioname,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'order' => 0,
            'status' => 1,
        ]);

        return redirect(route('level.index'));
    }

    public function status($id, $status)
    {
        $level = Level::findOrFail($id);
        $level->update(['status' => $status]);

        return response()->json(['msg' => 'done']);
    }

    public function orderings($id, $num)
    {
        $level = Level::findOrFail($id);
        $level->update(['order' => $num]);

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
        $level = Level::findOrFail($id);

        return view('dashboard.level.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *        return redirect(route('doctor.index'));.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level = Level::findOrFail($id);
        $level->delete();

        return redirect(route('level.index'));
    }

    public function update(Request $request, Level $question)
    {
        $question->update([
            'name' => $request->name,
            'country_id' => $request->country_id,
        ]);

        return redirect(route('level.index'));
    }
}
