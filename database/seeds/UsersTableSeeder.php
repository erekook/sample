<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users=factory(User::class)->times(10)->make();
      User::insert($users->toArray());

      $user = User::find(1);
      $user->name = 'Erek';
      $user->email = '1017581755@qq.com';
      $user->password = 'password';
      $user->activated = true;
      $user->is_admin = true;
      $user->save();

      $city_user = User::find(2);
      $city_user->name = 'City_User';
      $city_user->email = 'tlj122@126.com';
      $city_user->password = 'password';
      $city_user->activated = true;
      $city_user->is_admin = false;
      $city_user->save();

      $county_user = User::find(3);
      $county_user->name = 'County_User';
      $county_user->email = '2374439815@qq.com';
      $county_user->password = 'password';
      $county_user->activated = true;
      $county_user->is_admin = false;
      $county_user->save();




    }
}
