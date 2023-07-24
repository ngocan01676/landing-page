<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTableCoreTags2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('core_tags', function (Blueprint $table) {
            $table->text('detail_tag')->nullable();
            $table->integer('image_id')->nullable();
            $table->integer('image_id_detail')->nullable();
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
