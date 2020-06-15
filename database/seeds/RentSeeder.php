<?php

use App\Rent;
use Illuminate\Database\Seeder;

class RentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Rent::class, 10)->create();

        /* $bicycles = factory(Bicycle::class, 5)->create();
        $users = factory(User::class, 5)->create();

       // $bicycles->first()->users()->sync($users);
        $users->first()->bicycles()->sync($bicycles); */

    }
}
