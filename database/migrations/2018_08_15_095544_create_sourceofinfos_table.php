<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourceofinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sourceofinfo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sourcedesc');
            $table->string('status');
            $table->string('created_user');
            $table->timestamps('created_time');
            $table->string('modified_user');
            $table->timestamps('modified_time');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sourceofinfos');
    }
}
