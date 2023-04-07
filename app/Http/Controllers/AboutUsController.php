<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    public function index()
    {
        $about =AboutUs::all()->first();

        return view('admin.contents.aboutus.index', compact('about'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'mimes:jpeg,jpg,png|max:2048',
        ]);

        $about = AboutUs::all()->first();

        if (empty($about)){
            $image = $request->file('image')->store('images');
            AboutUs::create([
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'image' => $image,
            ]);
        }else{
            $image = $about->image;

            if ($request->image) {
                $image = $request->file('image')->store('images');
                if (!$about->image === 'images/about.png') {
                    $img_path = $image;
                    if (Storage::exists($img_path)) {
                        Storage::delete($img_path);
                    }
                }
            }

            $about->update([
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'image' => $image,
            ]);
        }

        return redirect()->back()->with('success', 'Tentag kami berhasil diperbarui');
    }
}
