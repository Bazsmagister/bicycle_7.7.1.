<?php

use Illuminate\Database\Seeder;

class PermissionUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('permission_user')->insert(array(
            'permission_id' => '1',
            'user_id' => '1',


            ));

        DB::table('permission_user')->insert(array(
            'permission_id' => '2',
            'user_id' => '2',


            ));

        DB::table('permission_user')->insert(array(
            'permission_id' => '3',
            'user_id' => '3',


            ));

        DB::table('permission_user')->insert(array(
            'permission_id' => '4',
            'user_id' => '4',


            ));
    }
}
