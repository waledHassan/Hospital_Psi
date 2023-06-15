<?php

namespace App\Http\Controllers\Saas;

use App\Models\Level;
use App\Models\Category;
use App\Services\PerService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = ((new PerService())->getPermissions());
        if (!in_array("level", $permissions)) {
            return redirect()->route('saas.home.index');
        }
        $levels = Level::get();

        return view('saas.level.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = ((new PerService())->getPermissions());
        if (!in_array("add_level", $permissions)) {
            return redirect()->route('saas.home.index');
        }
        return view('saas.level.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $audioname = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('upload/level'), $audioname);
        $level = Level::create([
            'image_name' => $audioname,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'order' => 0,
            'status' => 1,
        ]);

        return redirect(route('saas.level.index'));
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
        $level = Level::findOrFail($id);
        $questions = $level->questions()->get();
        // dd($questions);
        return view('saas.level.view',compact('level','questions'));
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
        if (!in_array("level_edit", $permissions)) {
            return redirect()->route('saas.home.index');
        }
        $level = Level::findOrFail($id);
        // dd($level);
        $categories = Category::get();

        return view('saas.level.edit', compact('level','categories'));
    }

    public function update(Request $request, Level $level)
    {
        $permissions = ((new PerService())->getPermissions());
        if (!in_array("level_edit", $permissions)) {
            return redirect()->route('saas.home.index');
        }
        $audioname = $level->image_name;
        if($request->photo){
            $audioname = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('upload/level'), $audioname);
        }
        $level->update([
            'image_name' => $audioname ,
            'name' => $request->name,
            'category_id' => $request->category_id == 'null' ? $level->category_id : $request->category_id ,
            'description' => $request->description,
            'order' => $request->order,
            'status' => $level->status,
        ]);
        return redirect(route('saas.level.index'));
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
        if (!in_array("level_delete", $permissions)) {
            return redirect()->route('saas.home.index');
        }
        $level = Level::findOrFail($id);
        $level->delete();

        return redirect(route('saas.level.index'));
    }


}
