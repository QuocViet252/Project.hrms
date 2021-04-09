<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role_employee = Role::where('name', 'employee')->first();
       $role_manager  = Role::where('name', 'admin')->first();

       $employee = new User();
       $employee->name = 'Nhandz';
       $employee->username = 'nhandz';
       $employee->email = 'nhandz@gmail.com';
       $employee->phone = '0789149969';
       $employee->role = 'admin';
       $employee->staff = '1';
       $employee->salary = '1000$';
       $employee->password = bcrypt('123456');
       $employee->save();
       $employee->roles()->attach($role_manager); // thêm quyền cho user, deattach để xóa 1 quyền

       $employee = new User();
       $employee->name = 'Staff';
       $employee->username = 'staff';
       $employee->email = 'staff@gmail.com';
       $employee->phone = '0789149969';
       $employee->role = 'employee';
       $employee->staff = '0';
       $employee->salary = '100$';
       $employee->password = bcrypt('123456');
       $employee->save();
       $employee->roles()->attach($role_employee);

       $employee = new User();
       $employee->name = 'Staff2';
       $employee->username = 'staff2';
       $employee->email = 'staff2@gmail.com';
       $employee->phone = '0789149969';
       $employee->role = 'employee';
       $employee->staff = '0';
       $employee->salary = '100$';
       $employee->password = bcrypt('123456');
       $employee->save();
       $employee->roles()->attach($role_employee);
    }
}
