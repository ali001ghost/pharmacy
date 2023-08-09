<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class category extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert
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
