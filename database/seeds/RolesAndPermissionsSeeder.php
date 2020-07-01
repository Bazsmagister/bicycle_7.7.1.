<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //Or you can use an Artisan command:
        //php artisan permission:cache-reset



        // create permissions
        Permission::create(['name' => 'view bicycles']);
        Permission::create(['name' => 'create bicycles']);


        Permission::create(['name' => 'edit bicycles']);
        Permission::create(['name' => 'delete bicycles']);

        // Permission::create(['name' => 'publish bicycles']);
        //Permission::create(['name' => 'unpublish bicycles']);

        // create roles and assign created permissions

        // this can be done as separate statements

        $role = Role::create(['name' => 'visitor']);
        $role->givePermissionTo('view bicycles');

        $role = Role::create(['name' => 'authuser']);
        $role->givePermissionTo('view bicycles');

        $role = Role::create(['name' => 'salesman']);
        $role->givePermissionTo('view bicycles', 'edit bicycles', 'create bicycles', 'delete bicycles');

        //$role = Role::create(['name' => 'salesman']);
        //$role->givePermissionTo('view bicycles', 'edit bicycles', 'create bicycles', 'delete bicycles', 'sell bicycles', 'buy bicycles');
        //There is no permission named `sell bicycles` for guard `web`.

        $role = Role::create(['name' => 'serviceman']);
        $role->givePermissionTo('view bicycles', 'edit bicycles', 'create bicycles', 'delete bicycles');


        // or may be done by chaining
        // $role = Role::create(['name' => 'boss-wife'])
        //     ->givePermissionTo(['edit bicycles', 'create bicycles']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        $admin = factory(\App\User::class)->create([
            'id'    => '1',
            'name'  => 'Admin Adam',
            'email' => 'admin@admin.com',
            'password' => bcrypt('adminadmin'),
            'phone' => '0623232565321',
        ]);
        $admin ->assignRole('super-admin');


        $serviceman = factory(\App\User::class)->create([
            'id'    => '2',
            'name'  => 'Serviceman Sergey(serviceman_1)',
            'email' => 'servicesergey@service.com',
            'password' => bcrypt('serviceservice'),
            'phone' => '0623232565321',
        ]);
        $serviceman ->assignRole('serviceman');

        $serviceman2 = factory(\App\User::class)->create([
            'id'    => '3',
            'name'  => 'Serviceman Sebastian(serviceman_2)',
            'email' => 'servicesebastian@service.com',
            'password' => bcrypt('serviceservice'),
            'phone' => '0623232565320',
        ]);
        $serviceman2 ->assignRole('serviceman');


        $salesman = factory(\App\User::class)->create([
            'id'    => '4',
            'name'  => 'Salesman Sam',
            'email' => 'sale@sale.com',
            'password' => bcrypt('salesale'),
            'phone' => '0623232565321',
        ]);
        $salesman ->assignRole('salesman');

        $authuser = factory(\App\User::class)->create([
            'id'    => '5',
            'name'  => 'Dr. Authenticated User',
            'email' => 'authuser@authuser.com',
            'password' => bcrypt('authuser'),
            'phone' => '0623232565321',
        ]);
        $authuser ->assignRole('authuser');

        $visitor = factory(\App\User::class)->create([
            'id'    => '6',
            'name'  => 'Visitor Customer',
            'email' => 'visitor@visitor.com',
            'password' => bcrypt('visitor'),
            'phone' => '0623232565321',
        ]);
        $visitor ->assignRole('visitor');




        // Role::create(['name' => 'admin']);
        // $admin = factory(\App\User::class)->create([
        // 'name' => 'John Doe',
        // 'email' => 'john@example.com',
        // 'phone' => '000121321215'
        // ]);
        // $admin->assignRole('admin');
    }
}
