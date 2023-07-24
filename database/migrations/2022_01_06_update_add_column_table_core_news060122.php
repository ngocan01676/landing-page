<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTableCoreNews060122 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('core_news', function (Blueprint $table) {
            $table->text('sub_title')->nullable();
            $table->text('description_1')->nullable();
            $table->text('description_2')->nullable();
            $table->text('description_3')->nullable();
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
