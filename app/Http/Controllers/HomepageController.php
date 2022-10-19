<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resort;


class HomepageController extends Controller
{

    public function __invoke(Request $request)
    {
        $resort = Resort::latest()->get();
        return view('resort', ['resorts'=>$resort]);
    }
}
