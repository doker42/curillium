<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.projects', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $input = $request->except('_token');
        $project = new Project();
        $project->fill($input);

        $img_name = $input['image']->getClientOriginalName();
        $project->img_name = $img_name;

        $path = $request->file('image')->storeAs('uploads/images', $img_name, 'public');
        $project->img_path = $path;

        if ($project->save()) {

            return redirect(route('projects'))->with('status', 'Project was created');

        } else {

            unlink('public/storage/' . $path);

            return redirect(route('create_project'))->withErrors('Project wasn\'t created');
        }
    }


    public function show($id)
    {
        $project = Project::find($id);

        return view('admin.projects.show', compact('project'));
    }


    public function edit($id)
    {
        $project = Project::find($id);

        return view('admin.projects.edit', compact('project'));
    }


    public function update(Request $request, $id)
    {
        $input = $request->except('_token');
        $project = Project::find($id);

        if(isset($input['image'])){
            $img_name = $input['image']->getClientOriginalName();
            $project->img_name = $img_name;
            if (isset($project->img_path)){
                unlink('public/storage/'.$project->img_path);
            }

            $path = $request->file('image')->storeAs('uploads/images', $img_name, 'public');
            $project->img_path = $path;
        }
        $project->fill($input);
        $project->status = isset($input['status']) ? true : false ;

        if ($project->update()) {

            return redirect()->route('projects')->with('status', 'Project was updated');

        } else {

            return redirect()->route('update_project', ['id' => $id])->withErrors('Project wasn\'t updated');
        }
    }


    public function destroy(Request $request, Project $project)
    {
        if ($project->delete()) {

            return redirect()->route('projects')->with('status', 'Project was deleted');

        } else {

            return redirect()->route('projects')->withErrors('Project wasn\'t deleted');
        }
    }
}
