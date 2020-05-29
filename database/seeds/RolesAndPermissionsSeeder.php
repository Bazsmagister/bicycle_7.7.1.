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
        Permission::create(['name' => 'create bicycles']);
        Permission::create(['name' => 'view bicycles']);

        Permission::create(['name' => 'edit bicycles']);
        Permission::create(['name' => 'delete bicycles']);

        // Permission::create(['name' => 'publish bicycles']);
        //Permission::create(['name' => 'unpublish bicycles']);

        // create roles and assign created permissions

        // this can be done as separate statements

        $role = Role::create(['name' => 'customer']);
        $role->givePermissionTo('view bicycles');

        $role = Role::create(['name' => 'salesman']);
        $role->givePermissionTo('view bicycles', 'edit bicycles', 'create bicycles', 'delete bicycles');

        //$role = Role::create(['name' => 'salesman']);
        //$role->givePermissionTo('view bicycles', 'edit bicycles', 'create bicycles', 'delete bicycles', 'sell bicycles', 'buy bicycles');
        //There is no permission named `sell bicycles` for guard `web`.

        $role = Role::create(['name' => 'serviceman']);
        $role->givePermissionTo('view bicycles', 'edit bicycles', 'create bicycles', 'delete bicycles');


        // or may be done by chaining
        $role = Role::create(['name' => 'boss-wife'])
            ->givePermissionTo(['edit bicycles', 'create bicycles']);

        $role = Role::create(['name' => 'boss-super-admin']);
        $role->givePermissionTo(Permission::all());


        Role::create(['name' => 'admin']);
        $admin = factory(\App\User::class)->create([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '000121321215'
        ]);
        $admin->assignRole('admin');
    }
}
