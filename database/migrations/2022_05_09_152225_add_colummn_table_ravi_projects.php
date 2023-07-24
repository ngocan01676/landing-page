<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColummnTableRaviProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('ravi_jobs', function (Blueprint $table) {
            $table->text('policy')->nullable();;
        });
        Schema::table('ravi_projects', function (Blueprint $table) {
            $table->text('policy')->nullable();;
        });
        Schema::table('core_news', function (Blueprint $table) {
            $table->text('policy')->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
