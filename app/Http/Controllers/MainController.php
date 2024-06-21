<?php

namespace App\Http\Controllers;


use App\Models\Aboutme;
use App\Models\Avatar;
use App\Models\Image;
use App\Models\MyJob;
use App\Models\Letter;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Visitor;
use App\Services\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $ip = $request->getClientIp();
        $visited_date = Date("Y-m-d:H:i:s");

        $location = Location::locationGet($ip);
        $visitor  = Visitor::updateOrCreate([
            'ip' => $ip,
            'location' => $location
        ], [
            'visited_date' => $visited_date
        ]);
        $visitor->increment('hits');

        $jobs     = MyJob::all();
        $avatar   = Avatar::where('status', 1)->first();
        $aboutme  = Aboutme::where('status', 1)->first();
        $image    = Image::where('status', 1)->first();
        $letter   = Letter::where('status', 1)->first();
        $projects = Project::where('status', 1)->get();
        $links    = Setting::getLinks();

        $data = [
            'avatar'   => $avatar,
            'aboutme'  => $aboutme,
            'image'    => $image,
            'letter'   => $letter,
            'projects' => $projects,
            'links'    => $links
        ];

        return view('sections.content', compact('jobs'), $data);
    }



    public function form()
    {
        return view('form');
    }


    public function contact(Request $request)
    {
        $input = $request->except('_token');

        try {
            Mail::send('layouts.mail', ['input' => $input], function ($message) {
                $message->from('doker42@gmail.com');
                $message->to('doker42@gmail.com', '');
            });

            echo 'OK';

        } catch (\Exception $e){

            echo($e->getMessage());
        }

        return view('form');
    }

}
