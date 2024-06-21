<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aboutme;

class AboutController extends Controller
{

    public function index()
    {
        $about = Aboutme::all();

        return view('admin.about.about', compact('about'));
    }


    public function create()
    {
        return view('admin.about.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'blockName' => ['required', 'string'],
            'info'      => ['required', 'string']
        ]);

        $about = Aboutme::create([
            'name'   => $validated['blockName'],
            'info'   => $validated['info'],
            'status' => false
        ]);

        if ($about) {
            return redirect(route('about'))->with('status', 'About was created');
        }

        return redirect(route('about'))->withErrors('About wasn\'t created');
    }


    public function edit($id)
    {
        $about = Aboutme::find($id);

        return view('admin.about.edit', compact('about'));
    }


    public function update(Request $request, $id)
    {
        $input = $request->except('_token');

        $about = Aboutme::find($id);

        $about->fill($input);

        if ($about->update()) {

            return redirect(route('about'))->with('status', 'About Info was updated');

        } else {

            return redirect(route('edit_about', ['id' => $id]))->withErrors('About info wasn\'t updated');
        }
    }


    public function updateStatus(Request $request, Aboutme $about)
    {
        Aboutme::where('status', 1)->update(['status' => 0]);

        if ($about->update(['status' => 1])) {

            return redirect(route('about'))->with('status', 'About Info was updated');

        } else {

            return redirect(route('about'))->withErrors('About info wasn\'t updated');
        }
    }

}
