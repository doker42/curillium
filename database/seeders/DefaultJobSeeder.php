<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $myjobs = [

            [
                'dateRange'   => '09.2017 - 05.2018',
                'companyName' => 'freelance',
                'companyLink' => '',
                'typeJob'     => 'qa manual',
                'position'    => 'qa manual',
                'library'     => '',
                'langs'       => '',
                'stack'       => '',
                'additions'   => 'site manual testing',
            ],
            [
                'dateRange'   => '05.2018 - 11.2018',
                'companyName' => 'Google',
                'companyLink' => 'https://google.com/',
                'typeJob'     => 'web development',
                'position'    => 'web developer',
                'library'     => 'Bootstrap',
                'langs'       => 'PHP, JS, Python',
                'stack'       => '',
                'additions'   => 'Worked with sites',
            ],
        ];

        DB::table('myjobs')->insert($myjobs);
    }
}
