<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[[
        	'review_list_id' => 1,
        	'session_id' => 1,
        	'name' => 'saya rasa masih perlu diperhatikan bagian pemberitahuan informasi pengambilan motor?'
        ],[
        	'review_list_id' => 2,
        	'session_id' => 2,
        	'name' => 'Mohon ditinjau lagi kebersihan bengkel'
        ]];

        DB::table('reviews')->insert($data);
    }
}
