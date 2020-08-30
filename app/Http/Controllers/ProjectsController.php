<?php

namespace App\Http\Controllers;


use App\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects;
        return view('projects.index',compact('projects'));
    }

    public function show(Project $project){
        $this->authorize('update',$project);
        return view('projects.show', compact('project'));

    }
    public function create(){
        return view('projects.create');
    }
    public function store()
    {
        
        $project = auth()->user()->projects()->create( $this->validateRequest());
        
        if (request()->wantsJson()) {
            return ['message' => $project->path()];
        }

       
        return redirect($project->path());
    }

    public function edit(Project $project){
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project){
        $this->authorize('update',$project);

        $attributes =$this->validateRequest();

        $project->update($attributes);
        return redirect($project->path());
    }

    public function destroy(Project $project){
        $this->authorize('update',$project);
        $project->delete();
        return redirect('/projects');
    }

    /**
     * Validate the request attributes.
     *
     * @return array
     */
    protected function validateRequest()
    {
        return request()->validate([
            'title' => 'sometimes|required',
            'description' => 'sometimes|required',
            'status' => 'min:3'
        ]);
    }
}
