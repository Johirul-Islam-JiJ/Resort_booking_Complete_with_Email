<?php

namespace App\Http\Controllers\Api;

use App\Models\Resort;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ResortResource;

class ResortController extends Controller
{

    public function index()
    {
        //Invoke for single method
    // public function __invoke(Request $request)
    // {
    //     $resort = Resort::latest()->get();
    //     return ResortResource::collection($resort);

    // }

        $resort = Resort::latest()->get();
        return ResortResource::collection($resort);


    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
