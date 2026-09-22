<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGroupToEducationTable extends Migration
{
    public function up()
    {
        Schema::table('education', function (Blueprint $table) {
            $table->string('group')->nullable()->after('institution'); // Science / Commerce / Arts
        });
    }

    public function down()
    {
        Schema::table('education', function (Blueprint $table) {
            $table->dropColumn('group');
        });
    }
}