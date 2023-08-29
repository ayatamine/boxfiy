<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //

    public function aboutUs()
    {
        $sections = AboutSection::orderBy('order','asc')->get();
        return view('about_us',compact('sections'));
    }
    public function terms()
    {
        $page = Page::where('title','like',"%terms%")->orWhere('slug','like',"%terms%")->first();
        return view('terms',compact('page'));
    }
    public function privacy()
    {
        return view('privacy');
    }
    public function services()
    {
        return view('services');
    }

    
}
