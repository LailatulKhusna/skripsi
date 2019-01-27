<?php

use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
        	'question_id' => 1,
        	'importance' => '1',
        	'performance' => '2'
        ],[
        	'question_id' => 2,
        	'importance' => '2',
        	'performance' => '3'
        ]];

        // DB::table('answers')->insert($data);
    }
}
