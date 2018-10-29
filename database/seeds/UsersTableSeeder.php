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
            1 => [544, 545, 546, 613],
            2 => [555, 582, 123, 544],
            3 => [555, 582, 123, 544],    
            4 => [555, 582, 123, 544],    
            5 => [555, 582, 123, 544],    
            6 => [555, 582, 123, 544],    
            7 => [555, 582, 123, 544],    
            8 => [555, 582, 123, 544],    
            9 => [555, 582, 123, 544],
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
    }
}
