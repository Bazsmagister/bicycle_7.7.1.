<?php

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //import DB facade! it works!
        // DB::table('users')->insert(array(
        //      'id' => '1',
        //     'name' => 'admin',
        //     'email' => 'admin@admin.com',
        //     'phone' => '06123456789',
        //     'password' => bcrypt('adminadmin'),


        //     // 'created_at' => 'NOW',
        //     // 'created_at' => 'new \DateTime();',
        //     // 'created_at' => 'echo(Carbon::now();)'

        //     // 'updated_at' => 'NOW'
        //     ));

        //this is also good! Watch for the numbers of the ?
        // DB::insert('insert into users (id, name, email, phone, password) values (?, ?, ?, ?, ?)', [1, 'admin', 'admin@admin.com', '06123456789', 'admin']);

        //Bicycle factory makes already as much User as Bicycle
        //factory(App\User::class, 5)->create();

         //create 10 users
         $user = factory(App\User::class,10)->create();
         //dd($user);

         $id_arr = Arr::pluck($user , 'id'); // get user id array
       
         // create 2 rents for each user
         $user->each(function ($user) {
             $rents = $user->rents()->saveMany(factory(App\Rent::class,2)->make());
             });     
 
    }
}
