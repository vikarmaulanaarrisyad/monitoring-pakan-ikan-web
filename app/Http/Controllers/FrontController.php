<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function landingpage()
    {
        $about = About::first();

        return view('frontend.landingpage', compact(
            'about'
        ));
    }
}
