<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      //   DB::table('users')->insert([
      //       'name' => 'nhandz',
      //       'username' => 'admin2',
      //       'email' => 'admin1235@gmail.com',
      //       'salary' => '10000$',
      //       'role' => 'Giám đốc',
      //       'staff' => '0',
      //       'phone' => '0781499969',
      //       'password' => bcrypt('123456'),
      // ]);
      //   DB::table('users')->insert([
      //       'name' => 'nhandzz',
      //       'username' => 'admin1',
      //       'email' => 'admin1234@gmail.com',
      //       'salary' => '1000$',
      //       'role' => 'Giám đốc',
      //       'staff' => '0',
      //       'phone' => '0781499969',
      //       'password' => bcrypt('123456'),
      // ]);
      //   DB::table('users')->insert([
      //       'name' => 'nhandzz',
      //       'username' => 'admin',
      //       'email' => 'admin123@gmail.com',
      //       'salary' => '1000$',
      //       'role' => 'Giám đốc',
      //       'staff' => '1',
      //       'phone' => '0781499969',
      //       'password' => bcrypt('123456'),
      // ]);
      $this->call(RoleTableSeeder::class);
      // User seeder will use the roles above created.
      $this->call(UserTableSeeder::class);
    }
}
