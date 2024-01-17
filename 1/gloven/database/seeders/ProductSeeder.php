<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::factory()->create([
            'title' => 'Страхование жизни',
            'url'=>'strahovanie_zhizni',
            'short_desc' => 'Страхование, предусматривающее защиту имущественных интересов застрахованного лица, связанных с его жизнью и смертью. Страхование жизни обычно связано с долговременными интересами страхователя/застрахованного лица в силу того, что жизнь рассматривается как длительное состояние, и, соответственно, событие смерти видится непрогнозируемым и отдалённым',
            'long_desc'=>'Договор между держателем страхового полиса и страховщиком или страхователем, по которому страховщик обещает выплатить назначенному бенефициару денежную сумму в случае смерти застрахованного лица (часто страхователя). В зависимости от контракта другие события, такие как неизлечимая болезнь или критическое заболевание, также могут привести к оплате. Страхователь обычно выплачивает страховую премию либо регулярно, либо единовременно. Льготы могут включать другие расходы, такие как расходы на похороны.',
            'price' => '32000',
        ]);
        \App\Models\Product::factory()->create([
            'title' => 'Страхование бизнеса',
            'url'=>'strahovanie_biznesa',
            'short_desc'=>'Это общее понятие, подразумевающее, что застраховать можно недвижимость, товар или обязательства перед третьими лицами. В случае неприятностей страховая выплата должна покрыть потери. Это гарантия для бизнеса и его эффективная защита, которая позволяет минимизировать расходы и делегирует их другому участнику сделки – страховой компании.',
            'long_desc'=>'Для крупных организаций, имеющих стабильное положение на рынке, убытки в случае нештатных ситуаций не очень опасны. Для маленьких фирм потери могут стать фатальными. Отличительная черта малого бизнеса – недостаток оборотных средств. Денег не всегда хватает на операционную деятельность, что уж говорить о форс-мажорах. Как обезопасить бизнес от краха из-за непредвиденных ситуаций? Обычно предприниматель выбирает один из трех вариантов: создать финансовый резерв, взять кредит или застраховать бизнес. У каждого варианта есть свои плюсы и минусы.',
            'price' => '25000',
        ]);

    }
}