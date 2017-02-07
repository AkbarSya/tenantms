<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */	
    public function run()
    {
        // $user = new User;
        // $user->role_detail = 'Admin1';
        // $user->name = 'abay';
        // $user->email = 'akbar.syabani@gmail.com';
        // $user->password = bcrypt('admin123');
        // $user->phone = '0219910239912';
        // $user->address = 'jl.pengadegan utara no.10 rt.05 / 07 kec.pancoran jaksel';
        // $user->save();
        
        \DB::table('users')->insert([
            // 'role_detail' => 'Admin1',
            'name'  => 'akbar',
            'email' => 'akbar.syabani@gmail.com',
            'password' => bcrypt('akbar155'),
            'phone' => '085891094888',
            'address' => 'jl.pengadegan utara no.10 rt.05 / 07 kec.pancoran jaksel'
        ]);

        \DB::table('roles')->insert([
            // 'role_detail' => 'Admin1',
            'name'  => 'admin',
            'display_name' => 'User Administrator',            
            'description' => 'User is allowed to manage and edit orders'
        ]);
        

        \DB::table('role_user')->insert([
            // 'role_detail' => 'Admin1',
            'user_id'  => '1',
            'role_id' => '1',            
        ]);

        \DB::table('users')->insert([
            // 'role_detail' => 'Account1',
            'name'  => 'accountant',
            'email' => 'akbar.account@gmail.com',
            'password' => bcrypt('account123'),
            'phone' => '085891094888',
            'address' => 'jl.pengadegan utara no.10 rt.05 / 07 kec.pancoran jaksel'
        ]);

        \DB::table('roles')->insert([
            // 'role_detail' => 'Admin1',
            'name'  => 'accounting',
            'display_name' => 'User Accountant',            
            'description' => 'User is allowed to manage and edit payments'
        ]);

        \DB::table('role_user')->insert([
            // 'role_detail' => 'Admin1',
            'user_id'  => '2',
            'role_id' => '2',            
        ]);

        \DB::table('users')->insert([
            // 'role_detail' => 'StockOp1',
            'name'  => 'stockop',
            'email' => 'akbar.operation@gmail.com',
            'password' => bcrypt('operation155'),
            'phone' => '085891094888',
            'address' => 'jl.pengadegan utara no.10 rt.05 / 07 kec.pancoran jaksel'
        ]);

        \DB::table('roles')->insert([
            // 'role_detail' => 'Admin1',
            'name'  => 'stockop',
            'display_name' => 'User Stock Operator',            
            'description' => 'User is allowed to manage and edit items'
        ]);
        
        \DB::table('role_user')->insert([
            // 'role_detail' => 'Admin1',
            'user_id'  => '3',
            'role_id' => '3',            
        ]);        

    }
}
