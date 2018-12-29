<?php

use Illuminate\Database\Seeder;

class ExpensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 15; $i++) {
            \App\Models\Expense::create([
                'category_id' => rand(1, 5),
                'description' => 'Some description...',
                'sum' => round(random_int(10000, 30000) + mt_rand() / mt_getrandmax(), 4)
            ]);
        }
    }
}
