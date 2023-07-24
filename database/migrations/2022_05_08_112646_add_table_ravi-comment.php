<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableRaviComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ravi_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->softDeletes();
            $table->integer('blog_id')->nullable();
            $table->string('full_name', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->text('comment', 255)->nullable();
            $table->nestedSet();
            $table->timestamps();
            $table->string('status', 50)->nullable();
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
        });

        Schema::table('core_subscribers', function (Blueprint $table) {
            $table->string('full_name', 255)->nullable();
            $table->string('phone_number', 255)->nullable();
        });

        Schema::table('bravo_contact', function (Blueprint $table) {
            $table->string('phone_number', 255)->nullable();
            $table->string('birthday', 255)->nullable();
            $table->string('location_name', 255)->nullable();
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
        Schema::dropIfExists('ravi_comments');
    }
}
