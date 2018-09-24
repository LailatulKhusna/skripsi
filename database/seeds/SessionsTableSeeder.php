<?php

use Illuminate\Database\Seeder;

class SessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[[
        	'branch_id' => 1,
        	'name' => 'pertama'
        ],[
        	'branch_id' => 2,
        	'name' => 'keuda'
        ]];

        DB::table('sessions')->insert($data);
    }
}
