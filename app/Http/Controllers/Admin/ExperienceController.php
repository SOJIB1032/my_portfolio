<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function index()
    {
        $items = Experience::orderBy('created_at','desc')->get();
        return view('admin.experience.index', compact('items'));
    }

    public function create()
    {
        return view('admin.experience.create');
    }

    public function store(Request $req)
    {
        $data = $req->validate([
            'title'=>'required|string|max:191',
            'company'=>'required|string|max:191',
            'start_date'=>'nullable|string|max:30',
            'end_date'=>'nullable|string|max:30',
            'description'=>'nullable|string',
            'website_url'=>'nullable|url|max:255',
        ]);

        Experience::create($data);
        return redirect()->route('admin.experience.index')->with('success','Experience added');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experience.edit', compact('experience'));
    }

    public function update(Request $req, Experience $experience)
    {
        $data = $req->validate([
            'title'=>'required|string|max:191',
            'company'=>'required|string|max:191',
            'start_date'=>'nullable|string|max:30',
            'end_date'=>'nullable|string|max:30',
            'description'=>'nullable|string',
            'website_url'=>'nullable|url|max:255',
        ]);

        $experience->update($data);
        return redirect()->route('admin.experience.index')->with('success','Experience updated');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return back()->with('success','Deleted');
    }
}
