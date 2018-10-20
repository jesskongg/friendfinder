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
        DB::table('users')->insert([
            'name' => 'Brad',
            'email' => 'brad@gmail.com',
            'password' => bcrypt('secret'),
            'bio' => 'heyooo'
        ]);        
        DB::table('users')->insert([
            'name' => 'Luanne',
            'email' => 'luann@gmail.com',
            'password' => bcrypt('secret'),
            'bio' => 'bird up'
        ]);        
        DB::table('users')->insert([
            'name' => 'Michael',
            'email' => 'michael@gmail.com',
            'password' => bcrypt('secret'),
            'bio' => 'you hittin the quad later?'
        ]);        
        DB::table('users')->insert([
            'name' => 'Daphne',
            'email' => 'daphne@gmail.com',
            'password' => bcrypt('secret'),
            'bio' => 'hit this ranch with me man'
        ]);        
    }
}
