<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Achievement;
use App\Models\Project;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database with starter content.
     * Everything here can be edited later from the Admin Panel.
     */
    public function run(): void
    {
        Profile::updateOrCreate(['id' => 1], [
            'name' => 'MD Sojib Hasan',
            'title' => 'Data Science & Web Developer',
            'tagline' => 'A Computer Science student building clean, accessible web apps and machine learning experiments.',
            'about' => 'I\'m a CSE student at Daffodil International University interested in data science, machine learning and web development. I enjoy building practical projects that help people.',
            'email' => 'you@example.com',
            'phone' => null,
            'github_url' => 'https://github.com/yourusername',
            'linkedin_url' => 'https://www.linkedin.com/in/yourprofile',
            'resume_url' => null,
            'projects_count' => '12+',
            'experience_count' => '3 internships',
        ]);

        $skills = [
            ['name' => 'Python', 'level' => 85],
            ['name' => 'TensorFlow', 'level' => 75],
            ['name' => 'Laravel', 'level' => 80],
            ['name' => 'SQL', 'level' => 80],
            ['name' => 'Java / Spring Boot', 'level' => 65],
        ];
        foreach ($skills as $s) {
            Skill::updateOrCreate(['name' => $s['name']], $s);
        }

        Education::updateOrCreate(
            ['degree' => 'B.Sc. in Computer Science & Engineering'],
            [
                'institution' => 'Daffodil International University',
                'start_year' => '2022',
                'end_year' => 'Present',
                'description' => null,
            ]
        );

        Experience::updateOrCreate(
            ['title' => 'Research Assistant (Deep Learning)'],
            [
                'company' => 'Daffodil International University',
                'start_date' => '2024',
                'end_date' => 'Present',
                'description' => "Conducted research on dragon fruit stem disease classification using deep learning.\nPreprocessed image datasets and trained CNN-based models.",
            ]
        );

        Achievement::updateOrCreate(
            ['title' => 'Research Paper — Dragon Fruit Stem Disease Classification'],
            [
                'issuer' => 'Deep Learning Research',
                'year' => null,
                'icon' => '📄',
            ]
        );

        Project::updateOrCreate(
            ['slug' => 'sample-project-1'],
            [
                'title' => 'Sample Project — Edit Me',
                'short_description' => 'Replace this with a real project from the Admin Panel.',
                'description' => "Go to Admin → Projects → Edit this project (or delete it and add your own).",
                'thumbnail' => null,
                'project_url' => null,
                'github_url' => null,
                'published' => true,
            ]
        );
    }
}
