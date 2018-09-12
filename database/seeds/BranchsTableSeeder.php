<?php

use Illuminate\Database\Seeder;

class BranchsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [[
        	'name' => 'Ahass Handayani 1',
        	'description' => 'Cabang Ahass di UNNES',
        ],[
        	'name' => 'Ahass Handayani 2',
        	'description'=>'Cabang Ahass di UNNES'
        ]];
        DB::table('branchs')->insert($data);
    }
}
