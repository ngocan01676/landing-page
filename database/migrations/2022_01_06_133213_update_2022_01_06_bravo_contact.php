<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update20220106BravoContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bravo_contact', function (Blueprint $table) {
            $table->text('file_url')->nullable();
            $table->string('apply_position',255)->nullable();
            $table->string('phone',20)->nullable();
            $table->text('file_name')->nullable();
            $table->string('file_type',50)->nullable();
            $table->string('file_extension',50)->nullable();
            $table->text('download')->nullable();
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
