<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		DB::table('khachhang')->insert([
    ['HoTen' => 'Nguyễn Văn A', 'NgaySinh' => '1991-10-10', 'GioTinh' => 'nam','CMND' => '183772837','SDT' => '1273827382','DiaChi' => '80 Phạm Văn Nghị','email' => 'anv@gmail.com'],
	['HoTen' => 'Nguyễn Văn B', 'NgaySinh' => '1991-10-10', 'GioTinh' => 'nam','CMND' => '283772837','SDT' => '2273827382','DiaChi' => '81 Phạm Văn Nghị','email' => '1anv@gmail.com'],
	['HoTen' => 'Nguyễn Văn C', 'NgaySinh' => '1991-10-10', 'GioTinh' => 'nam','CMND' => '383772837','SDT' => '3273827382','DiaChi' => '82 Phạm Văn Nghị','email' => '2anv@gmail.com'],
	['HoTen' => 'Nguyễn Văn D', 'NgaySinh' => '1991-10-10', 'GioTinh' => 'nam','CMND' => '483772837','SDT' => '4273827382','DiaChi' => '83 Phạm Văn Nghị','email' => '3anv@gmail.com'],
	['HoTen' => 'Nguyễn Văn E', 'NgaySinh' => '1991-10-10', 'GioTinh' => 'nam','CMND' => '583772837','SDT' => '5273827382','DiaChi' => '84 Phạm Văn Nghị','email' => '4anv@gmail.com'],
]);
       
    }
}
