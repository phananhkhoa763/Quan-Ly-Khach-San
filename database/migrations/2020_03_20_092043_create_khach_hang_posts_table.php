<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachHangPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('KhachHang', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->String('HoTen');
			$table->date('NgaySinh');
			$table->String('GioTinh');
			$table->integer('CMND');
			$table->integer('SDT');
			$table->String('DiaChi');
			$table->string('email')->unique();
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
        Schema::dropIfExists('KhachHang');
    }
}
