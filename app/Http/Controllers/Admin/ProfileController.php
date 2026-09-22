<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::current();
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $req)
    {
        $data = $req->validate([
            'name'=>'required|string|max:191',
            'title'=>'required|string|max:191',
            'tagline'=>'nullable|string|max:255',
            'about'=>'nullable|string',
            'photo'=>'nullable|image|max:2048',
            'email'=>'nullable|email|max:191',
            'phone'=>'nullable|string|max:50',
            'github_url'=>'nullable|url',
            'linkedin_url'=>'nullable|url',
            'resume_url'=>'nullable|url',
            'projects_count'=>'nullable|string|max:50',
            'experience_count'=>'nullable|string|max:50',
        ]);

        if ($req->hasFile('photo')) {
            $path = $req->file('photo')->store('profile','public');
            $data['photo'] = '/storage/' . $path;
        }

        $profile = Profile::first();
        if ($profile) {
            $profile->update($data);
        } else {
            Profile::create($data);
        }

        return redirect()->route('admin.profile.edit')->with('success','Profile updated');
    }
}
