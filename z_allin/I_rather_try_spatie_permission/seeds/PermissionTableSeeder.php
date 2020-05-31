<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert(array(
            'id' => '1',
            'name' => 'create',
            'slug' => 'create'
            ));

        DB::table('permissions')->insert(array(
            'id' => '2',
            'name' => 'read',
            'slug' => 'read',

            ));

        DB::table('permissions')->insert(array(
            'id' => '3',
            'name' => 'update',
            'slug' => 'update',

            ));

        DB::table('permissions')->insert(array(
            'id' => '4',
            'name' => 'delete',
            'slug' => 'delete',

            ));


        // DB::table('permissions')->insert([
        //     ['id' => '1'],
        //     ['name' => 'create'],
        //     ['slug' => 'create'],

        //     ]);

        // DB::table('permissions')->insert([
        //     ['id' => '2'],
        //     ['name' => 'read'],
        //     ['slug' => 'read'],

        //     ]);

        // DB::table('permissions')->insert([
        //     ['id' => '3'],
        //     ['name' => 'update'],
        //     ['slug' => 'update'],

        //     ]);

        // DB::table('permissions')->insert([
        //     ['id' => '4'],
        //     ['name' => 'delete'],
        //     ['slug' => 'update'],

        //     ]);
    }
}
