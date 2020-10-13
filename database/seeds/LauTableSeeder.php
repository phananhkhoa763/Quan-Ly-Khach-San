<?php

use Illuminate\Database\Seeder;

class LauTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('laus')->insert([
			['name' => 'Lầu 1'],
			['name' => 'Lầu 2'],
			['name' => 'Lầu 3'],
			['name' => 'Lầu 4'],
		]);
    }
}
