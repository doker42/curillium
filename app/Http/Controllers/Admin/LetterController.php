<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Letter;
use Illuminate\Support\Facades\Storage;

class LetterController extends Controller
{
    public function index()
    {
        $letters = Letter::all();

        return view('admin.letters.letters', compact('letters'));
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'letter'     => ['required', 'mimes:pdf']
        ]);

        $letter = $validated['letter'];

        $originalName = $letter->getClientOriginalName();
        $filename = Storage::disk('public')->put('letters', $letter);

        if ($filename) {
            Letter::create([
                'filename'      => $filename,
                'original_filename' => $originalName
            ]);

            return redirect(env('ADMIN').'/letters')->with('status', 'Letter was uploaded');
        }

        return redirect(env('ADMIN').'/letters')->withErrors('Letter wasn\'t uploaded');
    }



    public function update(Request $request, Letter $letter)
    {
        Letter::where('status', 1)->update(['status' => 0]);

        $letter->status = 1;

        if ($letter->update()){

            return redirect(env('ADMIN').'/letters')->with('status', 'The Letter was update');
        }

        return redirect(env('ADMIN').'/letters')->withErrors('The Letter wasn\'t updated');
    }




    public function destroy(Request $request, Letter $letter)
    {
        if ($letter->delete()){

            if (Storage::disk('public')->exists($letter->filename)){
                Storage::disk('public')->delete($letter->filename);
            }

            return redirect(env('ADMIN').'/letters')->with('status', 'Letter was deleted');
        }

        return redirect(env('ADMIN').'/letters')->withErrors('The Letter wasn\'t found');
    }
}
