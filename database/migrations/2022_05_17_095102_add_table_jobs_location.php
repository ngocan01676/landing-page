<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableJobsLocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ravi_job_locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',255)->nullable();
            $table->text('content')->nullable();
            $table->string('slug',255)->nullable();
            $table->string('status',50)->nullable();
            $table->nestedSet();
            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->softDeletes();

            $table->timestamps();
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
        Schema::dropIfExists('ravi_job_locations');
    }
}
