<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<10; $i++){
            DB::table('students')->insert([
                'name' => Str::random(10),
                'father_name' => Str:: random(10),
                'fees' => 5000,
                'university_id' => rand(1,5)
            ]);
        }
    }
}
