<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();

        return view('admin.images.images', ['images' => $images ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => ['required', 'mimes:png,jpg,jpeg', 'max:2048']
        ]);

        $image = $validated['image'];

        $originalName = $image->getClientOriginalName();
        $filename = Storage::disk('public')->put('images', $image);
        if ($filename) {
            Image::create([
                'filename' => $filename,
                'original_name' => $originalName
            ]);

            return redirect(env('ADMIN').'/images')->with('status', 'Image was uploaded');
        }

        return redirect(env('ADMIN').'/images')->withErrors('Image wasn\'t uploaded');
    }


    /**
     * @param Request $request
     * @param Image $image
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Image $image)
    {
        Image::where('status', 1)->update(['status' => 0]);
        $image = Image::find($image->id);
        $image->status = 1;
        if($image->update()){

            return redirect(env('ADMIN').'/images')->with('status', 'The Image was update');
        }

        return redirect(env('ADMIN').'/imagess')->withErrors('The Image wasn\'t updated');
    }

}
