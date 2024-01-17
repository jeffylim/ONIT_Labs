<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Condition::factory()->create([
            'title'=>'От 18 лет'
        ]);
        \App\Models\Condition::factory()->create([
            'title'=>'Отсутствие судимостей'
        ]);
        \App\Models\Condition::factory()->create([
            'title'=>'Отсутствие административных правонарушений'
        ]);
        \App\Models\Condition::factory()->create([
            'title'=>'Наличие ИП'
        ]);
        \App\Models\Condition::factory()->create([
            'title'=>'Хорошая кредитная история'
        ]);
        \App\Models\Condition::factory()->create([
            'title'=>'Вся ответственность за риски на вас'
        ]);
        \App\Models\Condition::factory()->create([
            'title'=>'Убытки, расходы и взносы в случае преднамеренного поврежения на вас'
        ]);
        \App\Models\Condition::factory()->create([
            'title'=>'Страховой взнос единовременно за весь срок'
        ]);

    }
}
