<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
             factory(App\User::class, 20)->create();
    }
}
