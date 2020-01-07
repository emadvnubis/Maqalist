<?php

use Illuminate\Database\Seeder;

use Maqalist\User;
use Maqalist\Role;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //  User::truncate();
      DB::table('role_user')->truncate();

      $adminRole = Role::where('name','admin')->first();
      $modRole = Role::where('name','moderator')->first();
      $subscriberRole = Role::where('name','subscriber')->first();

      $admin = User::create([
        'name' => 'Emad',
        'email' => 'admin@admin.com',
        'password' => Hash::make('123')
      ]);

      $mod = User::create([
        'name' => 'mod',
        'email' => 'mod@admin.com',
        'password' => Hash::make('123')
      ]);

      $subscriber = User::create([
        'name' => 'subs',
        'email' => 'subs@admin.com',
        'password' => Hash::make('123')
      ]);

      $admin->roles()->attach($adminRole);
      $mod->roles()->attach($modRole);
      $subscriber->roles()->attach($subscriberRole);


  //     DB::table('users')->insert([
  //     'name' => 'admin',
  //     'email' => 'admin@admin.com',
  //     'password' => bcrypt('123'),
  //   ]);
  //   DB::table('users')->insert([
  //   'name' => 'normal_user',
  //   'email' => 'normal@user.com',
  //   'password' => bcrypt('123'),
  // ]);

    }
}
