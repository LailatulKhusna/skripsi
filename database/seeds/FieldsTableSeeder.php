<?php

use Illuminate\Database\Seeder;

class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data=[[
        	'session_id' => 1,
        	'field_list_id' => 1,
        	'name' => 'Kebersihan',
        	'description' => 'tentang kebersihan bengkel'
        ],[
        	'session_id' => 2,
        	'field_list_id' => 2,
        	'name' => 'Kedisiplinan',
        	'description' => 'tentang kebersihan bengkel'
        ]];

        DB::table('fields')->insert($data);
    }
}
