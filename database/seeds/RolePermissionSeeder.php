<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $admin=new Role();
      $admin->name='Admin';
      $admin->description='Only one and only admin';
      $admin->save();

      $city=new Role();
      $city->name='City';
      $city->save();

      $county=new Role();
      $county->name='County';
      $county->save();

      $school=new Role();
      $school->name='School';
      $school->save();

      $manage_users=new Permission();
      $manage_users->name='manage-users-roles-and-permissions';
      $manage_users->description='Can manage users,roles and permissions';
      $manage_users->save();

      $admin->attachPermission('manage-users-roles-and-permissions');
      $user=User::find(1);
      $user->attachRole($admin);
      
    }
}
