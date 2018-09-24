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
        	'name' => 'saya rasa masih perlu diperhatikan bagian pemberitahuan informasi pengambilan motor?'
        ],[
        	'branch_id' => 2,
        	'name' => 'Mohon ditinjau lagi kebersihan bengkel'
        ]];

        DB::table('review_lists')->insert($data);
    }
}
