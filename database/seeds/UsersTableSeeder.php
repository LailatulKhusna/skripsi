<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
        	'role_id'=> 1,
        	'name' => 'admin',
        	'email' => 'ahass1@ahass.com',
        	'password' => bcrypt('password'),
        ],[
        	'role_id' => 2,
        	'name' => 'admin',
        	'email' => 'ahass2@ahass.com',
        	'password' => bcrypt('password'),
        ]];
        DB::table('users')->insert($data);
    }
}
