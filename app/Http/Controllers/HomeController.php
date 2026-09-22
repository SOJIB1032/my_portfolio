<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Achievement;

class HomeController extends Controller
{
    public function index()
    {
        $profile     = Profile::current();
        $projects    = Project::where('published', true)->orderBy('created_at','desc')->take(6)->get();
        $skills      = Skill::orderBy('level','desc')->get();
        $education   = Education::orderBy('created_at','desc')->get();
        $experience  = Experience::orderBy('created_at','desc')->get();
        $achievements = Achievement::orderBy('created_at','desc')->get();

        return view('home', compact(
            'profile','projects','skills','education','experience','achievements'
        ));
    }
}
