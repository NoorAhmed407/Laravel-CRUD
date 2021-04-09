<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i<10; $i++){
            DB::table('universities')->insert([
                'name' => Str::random(10),
                'address' => Str::random(30),
                'details' => Str:: random(30),
            ]);
        }

    }
}
