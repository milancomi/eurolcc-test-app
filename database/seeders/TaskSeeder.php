<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class TaskSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('tasks')->insert([
            ['name'=>'Locksmither'],
            ['name'=>'Painter'],
            ['name'=>'Storekeper'],
            ['name'=>'Welder'],
            ['name'=>'Crane driver']


        ]);

    }
}
