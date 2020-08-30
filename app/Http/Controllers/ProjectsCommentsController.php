<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsCommentsController extends Controller
{
    public function store(Project $project){
        $this->authorize('update',$project);
        
        request()->validate(['body'=>'required']);
        $project->addComment(request('body'));
        return redirect($project->path());

    }
}
