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
        	'name' => 'admin',
            'description' =>'sebagai admin'
        ],[
        	'name' => 'admin',
            'description' =>'sebagai admin'
        ]];
        DB::table('roles')->insert($data);
    }
}
