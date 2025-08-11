<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::with('category')->get(); // eager-load category
        return view('admin.type.index', compact('types'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.type.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $type = new Type();
        $type->category_id = $request->category_id;
        $type->name = $request->name;

        // Handle image upload
        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('type_images'), $filename);
            $type->image = $filename;
        }

        $type->save();
        return redirect()->route('admin.type.index')->with('success', 'Type created successfully');
    }

    public function edit(string $id)
    {
        $type = Type::findOrFail($id);
        $categories = Category::all();
        return view('admin.type.edit', compact('categories', 'type'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $type = Type::findOrFail($id);
        $type->category_id = $request->category_id;
        $type->name = $request->name;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($type->image && file_exists(public_path('type_images/' . $type->image))) {
                unlink(public_path('type_images/' . $type->image));
            }

            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('type_images'), $filename);
            $type->image = $filename;
        }

        $type->save();
        return redirect()->route('admin.type.index')->with('success', 'Type updated successfully');
    }

    public function destroy(string $id)
    {
        $type = Type::findOrFail($id);

        // Delete image file
        if ($type->image && file_exists(public_path('type_images/' . $type->image))) {
            unlink(public_path('type_images/' . $type->image));
        }

        $type->delete();
        return redirect()->route('admin.type.index')->with('success', 'Type deleted successfully');
    }
}
