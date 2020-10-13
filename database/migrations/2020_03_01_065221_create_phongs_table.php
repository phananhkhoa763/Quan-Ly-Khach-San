<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phongs', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->String('name')->unique();
			$table->integer('loaiphong_id')->unsigned();
			$table->integer('trangthai_id')->unsigned();
			$table->integer('lau_id')->unsigned();
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
        Schema::dropIfExists('phongs');
    }
}
