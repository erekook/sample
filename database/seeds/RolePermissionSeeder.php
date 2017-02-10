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

      $city_visit=new Permission();
      $city_visit->name='city_visit';
      $city_visit->description='Can visit the content of the city';
      $city_visit->save();

      $county_visit=new Permission();
      $county_visit->name='county_visit';
      $county_visit->description='Can visit the content of the county';
      $county_visit->save();

      $school_visit=new Permission();
      $school_visit->name='school_visit';
      $school_visit->description='Can visit the content of the school';
      $school_visit->save();

      //add permissions for thr role of admin
      $admin->perms()->sync(array($manage_users->id, $city_visit->id,$county_visit->id,$school_visit->id));

      //add permissions for the role of city_managers
      $city->perms()->sync(array($city_visit->id,$county_visit->id,$school_visit->id));

      //add permissions for the role of county_managers
      $county->perms()->sync(array($county_visit->id,$school_visit->id));

      $school->attachPermission($school_visit->id);


      $user=User::find(1);
      $user->attachRole($admin);

      $city_user=User::find(2);
      $city_user->attachRole($city);

      $county_user=User::find(3);
      $county_user->attachRole($county);

    }
}
