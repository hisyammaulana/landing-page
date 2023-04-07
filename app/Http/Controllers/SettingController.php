<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::all()->first();

        return view('admin.contents.setting.index', compact('setting'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:2048',
        ]);

        $setting = Setting::all()->first();

        if (empty($setting)){
            $image = $request->file('image')->store('images');
            Setting::create([
                'name' => $request->name,
                'link_facebook' => $request->link_facebook,
                'link_instagram' => $request->link_instagram,
                'link_playstore' => $request->link_playstore,
                'logo' => $image,
            ]);
        }else{
            $image = $setting->logo;

            if ($request->image) {
                $image = $request->file('image')->store('images');
                if (!$setting->image === 'images/logo.png') {
                    $img_path = $image;
                    if (Storage::exists($img_path)) {
                        Storage::delete($img_path);
                    }
                }
            }

            $setting->update([
                'name' => $request->name,
                'link_facebook' => $request->link_facebook,
                'link_instagram' => $request->link_instagram,
                'link_playstore' => $request->link_playstore,
                'logo' => $image,
            ]);
        }

        return redirect()->back()->with('success', 'Setting berhasil diperbarui');
    }
}
