<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTableRaviJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ravi_jobs', function (Blueprint $table) {
            $table->integer('image_id')->nullable();
        });

        Schema::table('ravi_project_categories', function (Blueprint $table) {
            //$table->bigInteger('parent_id')->nullable();
            $table->integer('image_id')->nullable();
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
