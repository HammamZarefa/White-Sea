<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipmentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status= [['name' => 'قيد التجهيز للتحميل'],
            ['name' => 'قيد التحميل'],
            ['name' => 'قيد التسليم ميناء حمد أو ميناء الدوحة'],
            ['name' => 'دخلت التخليص الجمركي بإنتظار إذن الإفراج'],
            ['name' => 'افرج عن الشحنة'],
            ['name' => 'إبحار من ميناء حمد بإتجاه خليج عمان'],
            ['name' => 'إبحار من خليج عمان بإتجاه بحر العرب'],
            ['name' => 'إبحار من بحر العرب بإتجاه خليج عدن'],
            ['name' => 'خليج عدن ابحار بإتجاه باب المندب'],
            ['name' => 'انتظار دخول باب المندب'],
            ['name' => 'دخلت من باب المندب للبحر الأحمر'],
            ['name' => 'إبحار البحر الأحمر بإتجاه قناة السويس'],
            ['name' => 'انتظار عبور قناة السويس'],
            ['name' => 'عبرت قناة السويس للمتوسط'],
            ['name' => 'إبحار البحر الابيض المتوسط بإتجاه ميناء اللاذقية'],
            ['name' => 'رست في ميناء اللاذقية'],
            ['name' => 'مرحلة التخليص ميناء اللاذقية'],
            ['name' => 'افرج عن الشحنة بإنتظار التحميل للمستودع'],
            ['name' => 'وصلت المستودع'],
            ['name' => 'مرحلة الفرز'],
            ['name' => 'قيد التسليم '],
            ['name' => 'تسلمت ']];

        foreach ($status as $item)
        DB::table('shipment_statuses')->insert(
           $item
        );
    }
}