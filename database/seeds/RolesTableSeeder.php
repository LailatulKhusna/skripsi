<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
        	'branch_id' => 1,
        	'name' => 'admin',
        ],[
        	'branch_id' => 2,
        	'name' => 'admin',
        ]];
        DB::table('roles')->insert($data);
    }
}
