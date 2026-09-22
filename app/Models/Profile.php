<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';

    protected $fillable = [
        'name','title','tagline','about','photo','email','phone',
        'github_url','linkedin_url','resume_url',
        'projects_count','experience_count',
    ];

    // There is always exactly one profile row (id = 1).
    public static function current()
    {
        return static::first() ?? new static([
            'name' => 'Your Name',
            'title' => 'Your Title',
        ]);
    }
}
