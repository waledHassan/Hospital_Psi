<?php

namespace App\Http\Controllers\Saas;

use App\Models\Category;
use App\Services\PerService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = ((new PerService())->getPermissions());
        if (!in_array("category", $permissions)) {
            return redirect()->route('saas.home.index');
        }
        $categories = Category::get();

        return view('saas.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = ((new PerService())->getPermissions());
        if (!in_array("add_category", $permissions)) {
            return redirect()->route('saas.home.index');
        }
        return view('saas.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect(route('saas.category.index'));
    }

    public function status($id, $status)
    {
        $Category = Category::findOrFail($id);
        $Category->update(['status' => $status]);

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
        if (!in_array("category_edit", $permissions)) {
            return redirect()->route('saas.home.index');
        }
        $category = Category::findOrFail($id);

        return view('saas.category.edit', compact('category'));
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
        if (!in_array("category_delete", $permissions)) {
            return redirect()->route('saas.home.index');
        }
        $Category = Category::findOrFail($id);
        $Category->delete();

        return redirect(route('saas.category.index'));
    }

    public function update(Request $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
        ]);

        return redirect(route('saas.category.index'));
    }
}
