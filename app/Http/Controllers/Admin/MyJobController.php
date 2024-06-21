<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MyJob;
use Illuminate\Http\Request;

class MyJobController extends Controller
{

    public function index()
    {
        $jobs = MyJob::all();

        return view('admin.jobs.jobs', compact('jobs'));
    }


    public function create()
    {
        return view('admin.jobs.create');
    }


    public function store(Request $request)
    {
        $input = $request->except('_token');
        $job = new MyJob();
        $job->fill($input);

        if ($job->save()) {

            return redirect(route('jobs'))->with('status', 'Job was created');

        } else {

            return redirect(route('create_job'))->withErrors('Job wasn\'t created');
        }
    }


    public function edit($id)
    {
        $job = MyJob::find($id);

        return view('admin.jobs.edit', compact('job'));
    }


    public function update(Request $request, $id)
    {
        $input = $request->except('_token');

        $job = MyJob::find($id);

        $job->fill($input);

        if ($job->update()) {

            return redirect(route('jobs'))->with('status', 'Job was updated');
        } else {

            return redirect(route('update_job', ['id' => $id]))->withErrors('Job wasn\'t updated');
        }
    }


    public function destroy(Request $request, MyJob $job)
    {
        if ($job->delete()) {

            return redirect(route('jobs'))->with('status', 'Job was deleted');
        } else {

            return redirect(route('jobs'))->withErrors('Job wasn\'t deleted');
        }
    }
}
