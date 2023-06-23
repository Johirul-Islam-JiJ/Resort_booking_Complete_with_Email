<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResortRequest;
use App\Http\Resources\ResortResource;
use App\Models\Resort;

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

        $resort = Resort::latest()->paginate();
        return ResortResource::collection($resort);

    }

    public function store(ResortRequest $request)
    {
        $valid = $request->validated();

        if ($request->hasFile('image')) {
            $valid['image'] = $request->file('image')->store('ResortImages', 'public');
        }
        $resort = Resort::create($valid);
        if ($resort) {
            return response()->json([
                'message' => 'Resort created successfully',
                'data' => new ResortResource($resort)]);
        }

        return response()->json(['error' => 'Uh !! Something Wrong'], 500);
    }
    

    public function show($resort)
    {
        return new ResortResource(Resort::findOrFail($resort));
    }

    public function update(ResortRequest $request, $resort)
    {
        $valid = $request->validated();
        $resort = Resort::findOrFail($resort);

        if ($request->hasFile('image')) {
            $valid['image'] = $request->file('image')->store('ResortImages', 'public');
        }
        if ($resort->update($valid)) {
            return response()->json([
                'message' => 'Resort updated successfully',
                'data' => new ResortResource($resort->fresh())]);
        }

        return response()->json(['error' => 'Uh !! Something Wrong'], 500);

    }

    public function destroy($resort)
    {
        $resort = Resort::findOrFail($resort);
        if ($resort->delete())
            return response()->json(['message' => 'Resort deleted successfully']);
        return response()->json(['error' => 'Uh !! Something Wrong'], 500);

    }

    public function search($name) {
        return Resort::where('name','like','%'.$name.'%')->get();
    }
}
