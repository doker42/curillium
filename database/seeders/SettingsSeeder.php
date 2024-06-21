<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'name'  => 'logo',
                'value' => 'LOGO_NAME',
                'description' => 'logo'
            ],
            [
                'name'  => 'git',
                'value' => 'https://github.com/',
                'description' => 'github link'
            ],
            [
                'name'  => 'linkedin',
                'value' => 'linkedin.com',
                'description' => 'linkIn link'
            ],
            [
                'name'  => 'location',
                'value' => 'Location',
                'description' => 'Location'
            ],
            [
                'name'  => 'skype',
                'value' => 'skype',
                'description' => 'linkIn link'
            ],
            [
                'name'  => 'phone',
                'value' => '1111111111',
                'description' => 'Phone'
            ],
        ];


        DB::table('settings')->insert($settings);
    }
}
