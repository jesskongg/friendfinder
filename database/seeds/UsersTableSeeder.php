<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // add Tom, 12, "hello"
        DB::table('users')->insert([
            'name' => 'Tom',
            'email' => 'tom@gmail.com',
            'password' => bcrypt('secret'),
            'bio' => 'hello'
        ]);        

        // add Lucy 24, "what up"
        DB::table('users')->insert([
            'name' => 'Lucy',
            'email' => 'lucy@gmail.com',
            'password' => bcrypt('secret'),
            'bio' => 'what up'
        ]);        
    }
}
