<?php

use Illuminate\Database\Seeder;

class BiodatasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[[
        	'user_id' => 1,
        	'name' => 'Ucup',
        	'gender' => 'L',
        	'position' => 'manager'
        ],[
        	'user_id' => 2,
        	'name' => 'Aam',
        	'gender' => 'L',
        	'position' => 'kepala bengkel'
        ]];

        DB::table('biodatas')->insert($data);
    }
}
