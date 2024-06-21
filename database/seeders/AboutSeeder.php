<?php

namespace Database\Seeders;

use App\Models\Aboutme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Aboutme::create([
            'name' => 'default',
            'info' => 'Default about me',
            'status' => 1
        ]);
    }
}
