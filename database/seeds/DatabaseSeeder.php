<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(BranchsTableSeeder::class);
    	$this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BiodatasTableSeeder::class);
        $this->call(SessionsTableSeeder::class);
        $this->call(FieldListsTableSeeder::class);
        $this->call(FieldsTableSeeder::class);
        $this->call(QuestionListsTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(AnswersTableSeeder::class);
        $this->call(ReviewListsTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
    }
}
