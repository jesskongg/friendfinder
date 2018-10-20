<?php

use Illuminate\Database\Seeder;

class FriendshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('friendships')->insert([
            'user_a' => 1,
            'user_b' => 2
        ]); 

        DB::table('friendships')->insert([
            'user_a' => 2,
            'user_b' => 1
        ]);

        DB::table('friendships')->insert([
            'user_a' => 1,
            'user_b' => 3
        ]); 

        DB::table('friendships')->insert([
            'user_a' => 1,
            'user_b' => 4
        ]);

        DB::table('friendships')->insert([
            'user_a' => 4,
            'user_b' => 1
        ]);

    }
}
