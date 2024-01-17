<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaticPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\StaticPage::factory()->create([
            'view' => 'static',
            'title' => 'Клиентам',
            'path' => 'clients',
            'content' => file_get_contents(__DIR__.'/L3/clients.html'),
        ]);
        \App\Models\StaticPage::factory()->create([
            'view' => 'static',
            'title' => 'Контакты',
            'path' => 'contacts',
            'content' => file_get_contents(__DIR__.'/L3/contacts.html'),
        ]);
        \App\Models\StaticPage::factory()->create([
            'view' => 'static',
            'title' => 'Подробнее',
            'path' => 'more',
            'content' => file_get_contents(__DIR__.'/L3/more.html'),
        ]);
        \App\Models\StaticPage::factory()->create([
            'view' => 'static',
            'title' => 'Партнерам',
            'path' => 'partners',
            'content' => file_get_contents(__DIR__.'/L3/partners.html'),
        ]);
        \App\Models\StaticPage::factory()->create([
            'view' => 'static',
            'title' => 'Регионы',
            'path' => 'regions',
            'content' => file_get_contents(__DIR__.'/L3/regions.html'),
        ]);
    }
}
