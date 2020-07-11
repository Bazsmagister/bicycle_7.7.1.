<?php

use Illuminate\Database\Seeder;

class BicycleToSellSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\BicycleToSell::class, 10)->create();

    }
}
