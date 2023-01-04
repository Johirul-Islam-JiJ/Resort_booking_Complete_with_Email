<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function promotions()
    {
        return view('frontend.promotions');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
    public function onepage()
    {
        return view('onepage.index');
    }

}
