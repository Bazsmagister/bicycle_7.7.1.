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
        // $this->call(UserSeeder::class);

        $this->call(UserSeeder::class);
        $this->call(BicycleSeeder::class);

        //  $this->call(RoleTableSeeder::class);
        //  $this->call(PermissionTableSeeder::class);

        //  $this->call(RoleUserSeeder::class);
        //  $this->call(PermissionUserSeeder::class);
        //  $this->call(PermissionRoleSeeder::class);
    }
}
