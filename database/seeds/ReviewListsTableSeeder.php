<?php

use Illuminate\Database\Seeder;

class ReviewListsTableSeeder extends Seeder
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
        	'name' => 'Silahkan masukan kritik dan saran dibawah ini'
        ],[
        	'branch_id' => 2,
        	'name' => 'Anda dapat menambahkan kritik dan saran dibawah ini'
        ]];

        DB::table('review_lists')->insert($data);
    }
}
