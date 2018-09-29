<?php

use Illuminate\Database\Seeder;

class FieldListsTableSeeder extends Seeder
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
        	'name' => 'Kebersihan',
        	'description' => 'tentang kebersihan bengkel'
        ],[
        	'branch_id' => 2,
        	'name' => 'Kedisiplinan',
        	'description' => 'tentang kedisplinan bengkel'
        ]];

        DB::table('field_lists')->insert($data);
    }
}
