<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BicycleSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(RentSeeder::class);
        $this->call(BicycleUserSeeder::class);
    }
}
