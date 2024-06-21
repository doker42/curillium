<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Avatar;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{

    public function index()
    {
        return view('admin.avatars.avatars', ['avatars' => Avatar::all()]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'avatar'     => ['required', 'mimes:png,jpg,jpeg', 'max:2048']
        ]);

        $avatar = $validated['avatar'];

        $originalName = $avatar->getClientOriginalName();
        $filename = Storage::disk('public')->put('avatars', $avatar);
        if ($filename) {
            Avatar::create([
                'filename'      => $filename,
                'original_name' => $originalName
            ]);

            return redirect(route('avatars'))->with('status', 'Avatar was uploaded');
        }

        return redirect(route('avatars'))->withErrors('Avatar wasn\'t uploaded');
    }


    public function update(Request $request, Avatar $avatar)
    {
        Avatar::where('status', 1)->update(['status' => 0]);

        if ($avatar->update(['status' => 1])) {
            return redirect(route('avatars'))->with('status', 'The Avatar was update');
        }

        return redirect(route('avatars'))->withErrors('The Avatar wasn\'t updated');
    }


    public function destroy(Request $request, Avatar $avatar)
    {
        if ($avatar->delete()) {

            if (Storage::disk('public')->exists($avatar->fileName)){
                Storage::disk('public')->delete($avatar->fileName);
            }

            return redirect(route('avatars'))->with('status', 'Avatar was deleted');

        } else {

            return redirect(route('avatars'))->withErrors('Avatar wasn\'t deleted');
        }
    }

}
