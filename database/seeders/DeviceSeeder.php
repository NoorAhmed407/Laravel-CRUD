<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Str;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<10; $i++){
            DB::table('devices')->insert([
                'name' => Str::random(10),
                'model' => Str:: random(5),
                'type' => Str::random(5),
                
            ]);
        }
    }
}
