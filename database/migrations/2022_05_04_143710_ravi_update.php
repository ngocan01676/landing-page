<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RaviUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ravi_projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            //Info
            $table->string('title', 255)->nullable();
            $table->string('sub_title', 255)->nullable();
            $table->string('slug', 255)->charset('utf8')->index();
            $table->text('content_1')->nullable();
            $table->text('content_2')->nullable();
            $table->text('content_3')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('image_id')->nullable();
            $table->integer('location_id')->nullable();
            $table->string('investor', 255)->nullable();
            $table->string('project_scale', 255)->nullable();
            $table->string('standard', 255)->nullable();
            $table->string('designer', 255)->nullable();
            $table->string('location_name', 255)->nullable();
            $table->string('gallery_top', 255)->nullable();
            $table->string('gallery_bottom', 255)->nullable();
            $table->string('video_link', 255)->nullable();
            $table->integer('video_id')->nullable();
            $table->string('status', 50)->nullable();
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('ravi_project_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',255)->nullable();
            $table->text('content')->nullable();
            $table->string('slug',255)->nullable();
            $table->string('status',50)->nullable();

            $table->nestedSet();
            $table->text('title')->nullable();
            $table->text('sub_title')->nullable();
            
            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->softDeletes();

            $table->timestamps();
        });
        Schema::create('ravi_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255)->nullable();
            $table->string('sub_title', 255)->nullable();
            $table->text('content_1')->nullable();
            $table->text('content_2')->nullable();
            $table->string('salary', 255)->nullable();
            $table->string('level', 255)->nullable();
            $table->string('recruitment_job', 255)->nullable();
            $table->integer('quantity')->nullable();
            $table->dateTime('due_date')->nullable();
            $table->string('location_name', 255)->nullable();
            $table->integer('location_id')->nullable();
            $table->string('slug', 255)->charset('utf8')->index();
            $table->string('status', 50)->nullable();
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
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
        Schema::dropIfExists('ravi_project_categories');
        Schema::dropIfExists('ravi_projects');
        Schema::dropIfExists('ravi_jobs');
    }
}
