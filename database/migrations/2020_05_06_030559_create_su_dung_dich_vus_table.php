<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuDungDichVusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('su_dung_dich_vus', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('khachHang_id')->unsigned();
			$table->integer('thuePhong_id')->unsigned();
			$table->integer('dichVu_id')->unsigned();
			$table->integer('soLuong');
			$table->integer('thanhToan');
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
        Schema::dropIfExists('su_dung_dich_vus');
    }
}
