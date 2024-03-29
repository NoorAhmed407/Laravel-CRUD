<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('test')->insert([
            'test_name' => Str::random(10),
            'test_address' => Str::random(30),
            'test_details' => Str:: random(10),
        ]);
        
    }
}
