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
      $users=factory(User::class)->times(50)->make();
      User::insert($users->toArray());

      $user = User::find(1);
      $user->name = 'Erek';
      $user->email = '1017581755@qq.com';
      $user->password = 'password';
      $user->activated = true;
      $user->is_admin = true;
      $user->level=5;
      $user->save();
    }
}