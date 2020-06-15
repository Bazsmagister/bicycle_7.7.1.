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
        $this->call(BicycleSeeder::class);
        $this->call(RentSeeder::class);
        $this->call(UserSeeder::class);
       
        //$this->call(BicycleUserSeeder::class);
        //$this->call(ServiceSeeder::class);
      
        
    }
}
