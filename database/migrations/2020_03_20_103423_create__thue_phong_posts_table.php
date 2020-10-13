<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThuePhongPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ThuePhong', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('Phong_id');
			$table->integer('KhachHang_id');
			$table->dateTime('NgayDen');
			$table->dateTime('NgayDi');
			$table->integer('ThanhToan');
			$table->string('tongTienPhong');
			$table->integer('NhanVien_id');
			$table->date('NgayTT');
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
        Schema::dropIfExists('ThuePhong');
    }
}
