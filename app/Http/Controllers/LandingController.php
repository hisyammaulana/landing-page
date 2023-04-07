<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Career;
use App\Models\Feature;
use App\Models\Hero;
use App\Models\Setting;
use App\Models\StoreCategory;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $hero = Hero::all()->first();
        $about = AboutUs::all()->first();
        $setting = Setting::all()->first();
        $features = Feature::all();
        $stores = StoreCategory::all();
        $careers = Career::all();

        return view('landing', compact('careers', 'hero', 'about', 'setting', 'features', 'stores'));
    }
}
