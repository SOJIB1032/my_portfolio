<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;

class EducationController extends Controller
{
    public function index()
    {
        $items = Education::orderBy('created_at','desc')->get();
        return view('admin.education.index', compact('items'));
    }

    public function create()
    {
        return view('admin.education.create');
    }

    public function store(Request $req)
    {
        $data = $req->validate([
            'degree'=>'required|string|max:191',
            'institution'=>'required|string|max:191',
            'group'=>'nullable|in:Science,Commerce,Arts,B.Sc,BA,BBA,MA,MBA,MSC',
            'start_year'=>'nullable|string|max:20',
            'end_year'=>'nullable|string|max:20',
            'description'=>'nullable|string',
        ]);

        Education::create($data);
        return redirect()->route('admin.education.index')->with('success','Education added');
    }

    public function edit(Education $education)
    {
        return view('admin.education.edit', compact('education'));
    }

    public function update(Request $req, Education $education)
    {
        $data = $req->validate([
            'degree'=>'required|string|max:191',
            'institution'=>'required|string|max:191',
            'group'=>'nullable|in:Science,Commerce,Arts,B.Sc,BA,BBA,MA,MBA,MSC',
            'start_year'=>'nullable|string|max:20',
            'end_year'=>'nullable|string|max:20',
            'description'=>'nullable|string',
        ]);

        $education->update($data);
        return redirect()->route('admin.education.index')->with('success','Education updated');
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return back()->with('success','Deleted');
    }
}
