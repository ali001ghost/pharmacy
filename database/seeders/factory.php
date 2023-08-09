<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class factory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('factories')->insert
        (

[
    [
        'name'=>'Generalities'
    ],
    [
        'name'=>'Philosophy'
    ],
    [
        'name'=>'Religion'
    ],
    [
        'name'=>'Social Science'
    ],
    [
        'name'=>'Languages'
    ],
    [
        'name'=>'Science'
    ],
    [
        'name'=>'Arts and Recreation'
    ],

    ]
);
    }
}
