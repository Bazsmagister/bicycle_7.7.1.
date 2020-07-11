<?php

use Illuminate\Database\Seeder;

class BicycleToServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\BicycleToService::class, 10)->create();
    }
}
