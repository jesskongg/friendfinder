<?php

use Illuminate\Database\Seeder;

class InterestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('interests')->insert([
            'type' => 'Second Degree'
        ]);

        DB::table('interests')->insert([
            'type' => 'Post Bachelor Diploma'
        ]);

        DB::table('interests')->insert([
            'type' => 'High GPA'
        ]);

        DB::table('interests')->insert([
            'type' => 'First Year'
        ]);

        DB::table('interests')->insert([
            'type' => 'Blockchain'
        ]);

        DB::table('interests')->insert([
            'type' => 'Artificial Intelligence'
        ]);

        DB::table('interests')->insert([
            'type' => 'Machine Learning'
        ]);

        DB::table('interests')->insert([
            'type' => 'Big Data'
        ]);

        DB::table('interests')->insert([
            'type' => 'Gaming'
        ]);

        DB::table('interests')->insert([
            'type' => 'Virtual Reality'
        ]);

        DB::table('interests')->insert([
            'type' => 'Animation'
        ]);

    }

    // $table->boolean('is_secondDegree')->default(false);
    // $table->boolean('is_PBD')->default(false);
    // $table->boolean('is_highGPA')->default(false);
    // $table->boolean('is_firstYear')->default(false);
    // $table->boolean('is_blockchain')->default(false);
    // $table->boolean('is_artificialIntelligence')->default(false);
    // $table->boolean('is_machineLearning')->default(false);
    // $table->boolean('is_bigData')->default(false);
    // $table->boolean('is_gaming')->default(false);
    // $table->boolean('is_virtualReality')->default(false);
    // $table->boolean('is_animation')->default(false);
    // $table->boolean('is_sports')->default(false);
}
