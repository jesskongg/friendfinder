<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
      /**
      * Run the database seeds.
      *
      * @return void
      */
      public function run()
      {
            
            $url = "http://www.sfu.ca/bin/wcm/academic-calendar";
            $year = date("Y");
            $month = date("m");

            if (1 <= $month && $month <= 4)
            {
                  $term = "spring";
            }
            else if (5 <= $month && $month <= 8)
            {
                  $term = "summer";
            }
            else
            {
                  $term = "fall";
            }

            $url = $url."?".$year."/".$term."/courses/cmpt";

            $courses = json_decode(file_get_contents($url, false, stream_context_create(['http' => ['method' => 'GET', 'header' => ['User-Agent: PHP']]])));

            foreach($courses as $course)
            {
                  DB::table('courses')->insert([
                      'department' => "cmpt",
                      'number' => $course->value,
                      'description' => $course->title,
                  ]);                 
            }
      }
}
