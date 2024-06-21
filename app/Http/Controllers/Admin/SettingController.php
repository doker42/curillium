<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aboutme;
use App\Models\Avatar;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::all();

        return view('admin.settings.list', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'   => ['required', 'string', 'max:10'],
            'value'  => ['required', 'string', 'max:255'],
            'description' => ['string', 'max:255']
        ]);

        $about = Setting::create([
            'name'        => $validated['name'],
            'value'       => $validated['value'],
            'description' => $validated['description'],
        ]);

        if ($about) {
            return redirect(env('ADMIN').'/settings')->with('status', 'Setting was created');
        }

        return redirect(env('ADMIN').'/settings')->withErrors('Setting wasn\'t created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $setting = Setting::find($id);

        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'   => ['required', 'string', 'max:10'],
            'value'  => ['required', 'string', 'max:255'],
            'description' => ['string', 'max:255']
        ]);

        $about = Setting::find($id);

        $about->fill($validated);

        if ($about->update()) {

            return redirect(env('ADMIN').'/settings')->with('status', 'Setting Info was updated');
        } else {

            return redirect(env('ADMIN').'/settings/edit/'.$id)->withErrors('Setting info wasn\'t updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Setting $setting)
    {
        if ($setting->delete()) {

            return redirect(env('ADMIN').'/settings')->with('status', 'Setting was deleted');

        } else {

            return redirect(env('ADMIN').'/settings')->withErrors('Setting wasn\'t deleted');
        }
    }
}
