<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Models\Project;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Achievement;
use App\Models\Skill;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        // Read admin credentials from env with sensible defaults
        $username = env('ADMIN_USERNAME', 'ADMIN');
        $password = env('ADMIN_PASSWORD', '123456');

        if ($request->username === $username && $request->password === $password) {
            $request->session()->put('is_admin', true);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['Invalid credentials']);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('is_admin');
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $stats = [
            'projects'     => Project::count(),
            'education'    => Education::count(),
            'experience'   => Experience::count(),
            'skills'       => Skill::count(),
            'achievements' => Achievement::count(),
            'unread'       => ContactMessage::where('read', false)->count(),
        ];

        $messages = ContactMessage::orderBy('created_at','desc')->take(6)->get();

        return view('admin.dashboard', compact('stats','messages'));
    }

    public function messages()
    {
        $messages = ContactMessage::orderBy('created_at','desc')->get();
        return view('admin.messages', compact('messages'));
    }

    public function markRead($id)
    {
        $msg = ContactMessage::findOrFail($id);
        $msg->read = true;
        $msg->save();
        return back()->with('success','Marked read');
    }
}
