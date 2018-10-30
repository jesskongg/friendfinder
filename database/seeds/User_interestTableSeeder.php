<?php

use Illuminate\Database\Seeder;

class User_interestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user_interest')->insert([
        	'user_id' => 1,
        	'interest_id' => 1
        ]);
        DB::table('user_interest')->insert([
        	'user_id' => 2,
        	'interest_id' => 1
        ]);        
    }
}
