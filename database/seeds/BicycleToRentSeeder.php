<?php

use Illuminate\Database\Seeder;

class BicycleToRentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\BicycleToRent::class, 10)->create();

    }
}
