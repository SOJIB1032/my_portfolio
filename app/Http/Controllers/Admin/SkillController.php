<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    public function index()
    {
        $items = Skill::orderBy('level','desc')->get();
        return view('admin.skills.index', compact('items'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $req)
    {
        $data = $req->validate([
            'name'=>'required|string|max:191',
            'level'=>'required|integer|min:0|max:100',
        ]);

        Skill::create($data);
        return redirect()->route('admin.skills.index')->with('success','Skill added');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $req, Skill $skill)
    {
        $data = $req->validate([
            'name'=>'required|string|max:191',
            'level'=>'required|integer|min:0|max:100',
        ]);

        $skill->update($data);
        return redirect()->route('admin.skills.index')->with('success','Skill updated');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return back()->with('success','Deleted');
    }
}
