<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data=[[
        	'field_id' => 1,
        	'question_list_id' => 1,
        	'name' => 'apakah bersih?'
        ],[
        	'field_id' => 2,
        	'question_list_id' => 2,
        	'name' => 'apakah disiplin?'
        ]];

        DB::table('questions')->insert($data);
    }
}
