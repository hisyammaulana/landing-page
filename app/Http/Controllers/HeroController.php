<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function index()
    {
        $hero = Hero::all()->first();

        return view('admin.contents.hero.index', compact('hero'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'mimes:jpeg,jpg,png|max:2048',
        ]);

        $hero = Hero::all()->first();

        if (empty($hero)){
            $image = $request->file('image')->store('images');
            Hero::create([
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'image' => $image,
            ]);
        }else{
            $image = $hero->image;

            if ($request->image) {
                $image = $request->file('image')->store('images');
                if (!$hero->image === 'images/hero.png') {
                    $img_path = $image;
                    if (Storage::exists($img_path)) {
                        Storage::delete($img_path);
                    }
                }
            }

            $hero->update([
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'image' => $image,
            ]);
        }

        return redirect()->back()->with('success', 'Hero berhasil diperbarui');
    }
}
