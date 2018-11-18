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
        $this->call(UsersTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(InterestsTableSeeder::class);
        $this->call(User_interestTableSeeder::class);
    }
}
