<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    //
    public function index()
    {
        //
        $types = Type::all();
        return view('admin.type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.type.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'category_id' => 'required',
                'name' => 'required',
            ]
        );
        $type = new Type();
        $type->category_id = $request->category_id;
        $type->name = $request->name;
        $type->save();
        return redirect()->route('admin.type.index')->with('success', 'Type created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $type = Type::find($id);
        //dd($type);
        $categories = Category::all();
        return view('admin.type.edit', compact('categories', 'type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                'category_id' => 'required',
                'name' => 'required',
            ]
        );
        $type = Type::find($id);
        $type->category_id = $request->category_id;
        $type->name = $request->name;
        $type->save();
        return redirect()->route('admin.type.index')->with('success', 'Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Type::find($id)->delete();
        return redirect()->route('admin.type.index')->with('success', 'Type deleted successfully');
    }
}
