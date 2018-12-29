<?php

use Illuminate\Database\Seeder;

class ExpensesCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::getCategories() as $category) {
            \App\Models\Category::create([
               'name' => $category
            ]);
        }
    }

    public static function getCategories()
    {
        return [
            'Материальные затраты',
            'Амортизация',
            'Затраты на оплату труда',
            'Отчисления на социальные нужды',
            'Штрафы'
        ];
    }
}
