<?php

use App\Bicycle;
use App\User;

use Illuminate\Database\Seeder;

class BicycleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $applications = factory(App\Applicant::class, 20)->create();
        // $skills = factory(App\Skill::class, 20)->create();
        // $applications->first()->skills()->sync($skills);

        $bicycles = factory(Bicycle::class, 5)->create();
        $users = factory(User::class, 5)->create();

        $bicycles->first()->users()->sync($users);
    }
}
