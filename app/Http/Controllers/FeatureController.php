<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::all();
        return view('admin.contents.features.index', compact('features'));
    }

    public function create()
    {
        return view('admin.contents.features.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:2048',
        ]);

        $image = $request->file('image')->store('images');

        Feature::create([
            'name' => $request->name,
            'image' => $image
        ]);

        return redirect()->back()->with('success', 'Fitur berhasil disimpan!');
    }

    public function edit(string $id)
    {
        $feature = Feature::find($id);

        return view('admin.contents.features.edit', compact('feature'));
    }

   public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:2048',
        ]);

        $career = Feature::find($id);
        $img = $career->image;
        if ($request->image) {
            $img = $request->file('image')->store('images');
            if (!$career->image === 'images/feature.png') {
                $img_path = $img;
                if (Storage::exists($img_path)) {
                    Storage::delete($img_path);
                }
            }
        }
        $career->update([
            'name' => $request->name,
            'image' => $img,
        ]);

        return redirect()->back()->with('success', 'Fitur berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $career = Feature::find($id);
        $career->delete();
        return redirect()->back()->with('success', 'Fitur berhasil dihapus!');
    }
}
