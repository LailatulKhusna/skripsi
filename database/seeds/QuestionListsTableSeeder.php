<?php

use Illuminate\Database\Seeder;

class QuestionListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[[
        	'field_list_id' => 1,
        	'name' => 'apakah bersih?'
        ],[
        	'field_list_id' => 2,
        	'name' => 'apakah disiplin?'
        ]];

        DB::table('question_lists')->insert($data);
    }
}
