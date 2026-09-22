<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTable extends Migration
{
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');           // e.g. "Data Science & Web Developer"
            $table->string('tagline')->nullable(); // short line under name
            $table->text('about')->nullable();     // About Me paragraph
            $table->string('photo')->nullable();   // path in /public/images
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('github_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('resume_url')->nullable(); // link to CV/resume file
            $table->string('projects_count')->nullable();   // hero stat, free text e.g. "12+"
            $table->string('experience_count')->nullable(); // hero stat, free text e.g. "3 internships"
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profile');
    }
}
