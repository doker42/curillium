<?php

namespace Database\Seeders;

use App\Models\Aboutme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutMeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Aboutme::create([
            'name' => 'first',
            'info' => 'Hi! I\'m Vitalii Chebotnikov. I\'m a web-developer.I started as a QA Automation tester. I started to learn the JAVA myself and finished the QA Automation courses (got a certificate) because I didn\'t have a manual testing background I couldn\'t get QA Automation position. Like a freelance tested I had tested two IT-projects. I continued my self web-education and on the courses of the IT Step academy (web-development, 1 year). While I was studying I made my first little commercial project (a little corporate application). <br>My first full-time job was a position in the Managerigs.com. In that company, I was developing admin-panel and background functionality, the main site, and user cabinet. My next full-time job was a position in the Mementia company.My main work was customization and support existing e-commerce projects. I worked with Symfony/Prestashop/Shopify/Magento2/Odoo projects. Almost two years I am working out stuff on a Symfony project<br>Since 12.2019 I work a little part-time in the Mementia on the Symfony project and work as a freelancer. I can\'t show these projects in my portfolio cause NDA. But I can show my little training projects in the \"My APPs\"<br> About stacks that I use.Mainly I use PHP, a little JS/JQuery & sometimes Python. I can execute not difficult tasks on the front-end but I like to work with back-end more. I can work with Rest API, I know Docker a little. I work with Composer / Git / Jira. I can create REST API. <br>This site I created myself on the AWS (Linux / Apache / PHP / MySQL). I used Laravel & Bootstrap & a little JS.All content adds through Admin panel. I can solve many tasks on my own.',
            'status' => 1
        ]);
    }
}
