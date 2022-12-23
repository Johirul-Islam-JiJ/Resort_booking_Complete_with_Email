<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Resort;
use Illuminate\Support\Facades\Storage;

class ResortController extends Controller
{

    public function index()
    {
        $resort = Resort::withTrashed()->latest()->filter(request(['search']))->paginate(5);
        return view('resorts.index', ['resorts' => $resort]);
    }



    public function create()
    {
        return view('resorts.create');
    }


    public function store(Request $request)
    {

        $valid = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'gt:0'],
            'description' => ['required', 'max:255'],
            'image' => ['required', 'image', 'max:2048'],
        ]);


        if ($request->hasFile('image'))
            $valid['image'] = $request->file('image')->store('ResortImages', 'public');

        if (Resort::create($valid));
        return redirect(route('resorts.index'))->with('message', 'Resort added Successfully');

        return redirect(route('resorts.index'))->with('error', 'Somethings Went Wrong');
    }


    public function edit(Resort $resort)
    {
        $resort = Resort::findOrFail($resort->id);
        return view('resorts.edit', ['resorts' => $resort]);
    }


    public function update(Request $request, Resort $resort)
    {
        $valid = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'gt:0'],
            'description' => ['required', 'max:255'],
            'image' => ['required', 'image', 'max:2048'],
        ]);

        $resort = Resort::findOrFail($resort->id);

        if ($request->hasFile('image')) {
            if (Storage::disk('public')->exists($resort->getRawOriginal('image')))
                Storage::disk('public')->delete($resort->getRawOriginal('image'));

            $valid['image'] = $request->file('image')->store('ResortImages', 'public');
        }

        if ($resort->update($valid))
            return redirect(route('resorts.index'))->with('message', 'Resort updated Successfully');

        return redirect(route('resorts.index'))->with('error', 'Somethings Went Wrong');
    }


    public function destroy(Resort $resort)
    {
        $resort = Resort::findOrFail($resort->id);
        $resort->delete();

        return redirect(route('resorts.index'))->with('message', 'Resort Trashed Successfully');
    }


    public function restore($id)
    {
        $resort = Resort::withTrashed()->findOrFail($id);
        $resort->restore();

        return redirect(route('resorts.index'))->with('message', 'Resort Restore Successfully');
    }

    public function forceDelete($id)
    {
        $resort = Resort::withTrashed()->findOrFail($id);

        if (Storage::disk('public')->exists($resort->getRawOriginal('image')))
            Storage::disk('public')->delete($resort->getRawOriginal('image'));

        $resort->forceDelete();

        return redirect(route('resorts.index'))->with('message', 'Resort Deleted Successfully');
    }

     public function cards()
    {
        $resort = Resort::withTrashed()->latest()->filter(request(['search']))->paginate(5);
        return view('resorts.cardlist', ['resorts' => $resort]);
    }
}
