<?php

namespace Database\Seeders;

use App\Models\MyJob;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MyJobSeeder extends Seeder
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
                'companyName' => 'Managerigs',
                'companyLink' => 'https://managerigs.com/',
                'typeJob'     => 'web development',
                'position'    => 'web developer',
                'library'     => 'Bootstrap',
                'langs'       => 'PHP, JS, Python',
                'stack'       => '',
                'additions'   => 'Worked with main site, created client cabinet, customized admin panel, created chat bot',
            ],
            [
                'dateRange'   => '12.2018 - 12.2020',
                'companyName' => 'Mementia',
                'companyLink' => '',
                'typeJob'     => '',
                'position'    => '',
                'library'     => 'PHP, JS, Python',
                'langs'       => 'PHP, JS, Python',
                'stack'       => '',
                'additions'   => '',
            ],
            [
                'dateRange'   => '12.2019 - 12.2020',
                'companyName' => 'freelance',
                'companyLink' => '',
                'typeJob'     => '',
                'position'    => '',
                'library'     => '',
                'langs'       => 'PHP, JS, Python',
                'stack'       => '',
                'additions'   => '',
            ],
            [
                'dateRange'   => '12.2020 - 02.2022',
                'companyName' => 'EdaRegion',
                'companyLink' => '',
                'typeJob'     => '',
                'position'    => '',
                'library'     => '',
                'langs'       => 'PHP, JS',
                'stack'       => '',
                'additions'   => '',
            ],
            [
                'dateRange'   => '03.2022 - 05.2024',
                'companyName' => 'Sreda',
                'companyLink' => 'https://sreda.ai',
                'typeJob'     => 'backend-developer',
                'position'    => 'backend-developer',
                'library'     => '',
                'langs'       => 'PHP',
                'stack'       => 'Laravel, api',
                'additions'   => 'developing api, integration with Zoho CRM, Telegram bot',
            ],
        ];

        DB::table('myjobs')->insert($myjobs);

    }
}
