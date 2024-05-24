<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Faq;
use App\Models\Feature;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function landingpage()
    {
        $about = About::first();
        $features = Feature::limit(5)->get();
        $faqs = Faq::all();

        return view('frontend.landingpage', compact(
            'about',
            'faqs',
            'features'
        ));
    }
}
