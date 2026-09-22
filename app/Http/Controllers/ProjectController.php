<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Profile;

class ProjectController extends Controller
{
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        $profile = Profile::current();
        return view('projects.show', compact('project', 'profile'));
    }
}
