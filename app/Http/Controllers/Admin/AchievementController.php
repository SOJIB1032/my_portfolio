<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Achievement;

class AchievementController extends Controller
{
    public function index()
    {
        $items = Achievement::orderBy('created_at','desc')->get();
        return view('admin.achievements.index', compact('items'));
    }

    public function create()
    {
        return view('admin.achievements.create');
    }

    public function store(Request $req)
    {
        $data = $req->validate([
            'title'=>'required|string|max:191',
            'issuer'=>'nullable|string|max:191',
            'year'=>'nullable|string|max:20',
            'icon'=>'nullable|string|max:10',
        ]);

        Achievement::create($data);
        return redirect()->route('admin.achievements.index')->with('success','Achievement added');
    }

    public function edit(Achievement $achievement)
    {
        return view('admin.achievements.edit', compact('achievement'));
    }

    public function update(Request $req, Achievement $achievement)
    {
        $data = $req->validate([
            'title'=>'required|string|max:191',
            'issuer'=>'nullable|string|max:191',
            'year'=>'nullable|string|max:20',
            'icon'=>'nullable|string|max:10',
        ]);

        $achievement->update($data);
        return redirect()->route('admin.achievements.index')->with('success','Achievement updated');
    }

    public function destroy(Achievement $achievement)
    {
        $achievement->delete();
        return back()->with('success','Deleted');
    }
}
