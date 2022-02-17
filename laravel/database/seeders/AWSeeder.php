<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class AWSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<50;$i++)
        {DB::table('artwork')->insert([
            'name' => Str::random(10),
            'Description' => Str::random(10),
            'heritage_site_id' => 1,
            'iotDescrId' => 1,
            'iotPosId' => 1,
        ]);}
    }
}
