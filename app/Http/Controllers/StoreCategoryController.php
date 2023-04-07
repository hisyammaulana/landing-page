<?php

namespace App\Http\Controllers;

use App\Models\StoreCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreCategoryController extends Controller
{
    public function index()
    {
        $categories = StoreCategory::all();
        return view('admin.contents.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.contents.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:2048',
        ]);

        $image = $request->file('image')->store('images');

        StoreCategory::create([
            'name' => $request->name,
            'image' => $image
        ]);

        return redirect()->back()->with('success', 'Kategori toko berhasil disimpan!');
    }

    public function edit(string $id)
    {
        $category = StoreCategory::find($id);

        return view('admin.contents.categories.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => 'mimes:jpeg,jpg,png|max:2048',
        ]);

        $category = StoreCategory::find($id);
        $img = $category->image;
        if ($request->image) {
            $img = $request->file('image')->store('images');
            if (!$category->image === 'images/store.png') {
                $img_path = $img;
                if (Storage::exists($img_path)) {
                    Storage::delete($img_path);
                }
            }
        }
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $img,
        ]);

        return redirect()->back()->with('success', 'Kategori toko berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        //
    }
}
