<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhanVienPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NhanVien', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->String('HoTen');
			$table->date('NgaySinh');
			$table->String('GioTinh');
			$table->integer('CMND');
			$table->integer('SDT');
			$table->String('DiaChi');
			$table->integer('ChucVu_id');
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
        Schema::dropIfExists('NhanVien');
    }
}
