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
        $names = [
            0 => 'Tom', 
            1 => 'Lucy', 
            2 => 'Brad', 
            3 => 'Luanne', 
            4 => 'Michael',
            5 => 'Daphne',
            6 => 'Tom', 
            7 => 'Tom',
            8 => 'Brad',
            9 => 'Lucy',
        ];

        $emails = [
            0 => 'tom@gmail.com',
            1 => 'lucy@gmail.com',
            2 => 'brad@gmail.com',
            3 => 'luanne@gmail.com',
            4 => 'michael@gmail.com',
            5 => 'daphne@gmail.com',
            6 => 'tom1@gmail.com',
            7 => 'tom2@gmail.com',
            8 => 'brad1@gmail.com',
            9 => 'lucky1@gmail.com',
        ];

        $bios = [
            0 => 'hello',
            1 => 'what up',
            2 => 'heyooo',
            3 => 'bird up',
            4 => 'you hittin the quad later?',
            5 => 'hit this ranch with me man',
            6 => 'good day',
            7 => 'i need friends',
            8 => 'array starts at -1',
            9 => 'lucy version 2',
        ];

        $enrollments = [
            0 => [],
            1 => [2, 3, 4, 15],
            2 => [2, 3, 4, 16],
            3 => [2, 4, 5, 17],    
            4 => [2, 4, 5, 18],    
            5 => [2, 4, 5, 19],    
            6 => [2, 4, 6, 20],    
            7 => [2, 5, 7, 21],    
            8 => [2, 5, 8, 22],    
            9 => [2, 6, 9, 23],
        ];

        for ($i = 0; $i < count($names); ++$i) {
            DB::table('users')->insert([
                'name' => $names[$i],
                'email' => $emails[$i],
                'password' => bcrypt('secret'),
                'bio' => $bios[$i],
            ]);
            for ($j = 0; $j < count($enrollments[$i]); ++$j) {
                DB::table('enrollments')->insert([
                    'user_id' => $i,
                    'course_id' => $enrollments[$i][$j],
                ]);
            }
        }

        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('test'),
            'bio' => "test account",
        ]);

        DB::table('users')->insert([
            'name' => 'test2',
            'email' => 'test2@test.com',
            'password' => bcrypt('test2'),
            'bio' => "test account number 2",
        ]);

    }
}
