<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::all();

        return view('admin.contents.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.contents.careers.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:2048',
        ]);

        $image = $request->file('image')->store('images');

        Career::create([
            'title' => $request->title,
            'image' => $image,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Karir berhasil disimpan!');
    }

    public function edit(string $id)
    {
        $career = Career::find($id);

        return view('admin.contents.careers.edit', compact('career'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:2048',
        ]);

        $career = Career::find($id);
        $img = $career->image;
        if ($request->image) {
            $img = $request->file('image')->store('images');
            if (!$career->image === 'images/career.png') {
                $img_path = $img;
                if (Storage::exists($img_path)) {
                    Storage::delete($img_path);
                }
            }
        }
        $career->update([
            'title' => $request->title,
            'image' => $img,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Karir berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $career = Career::find($id);
        $career->delete();
        return redirect()->back()->with('success', 'Karir berhasil dihapus!');
    }
}
