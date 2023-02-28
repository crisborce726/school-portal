<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('Asia/Manila');

        $password = Hash::make('user');
        
        DB::table('users')->insert([
            'id' => '20230001',
            'role' => 'admin',
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'gender' => 'M',
            'email' => 'admin@gmail.com',
            'password' => $password,
            'cover_image' => 'male.jpg',
            'status' => '1',
            'remember_token' => Str::random(10),
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('users')->insert([
            'id' => '20230002',
            'role' => 'teacher',
            'firstname' => 'Teacher',
            'lastname' => 'Teacher',
            'gender' => 'M',
            'email' => 'teacher@gmail.com',
            'password' => $password,
            'cover_image' => 'male.jpg',
            'status' => '1',
            'remember_token' => Str::random(10),
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('users')->insert([
            'id' => '20230003',
            'role' => 'cashier',
            'firstname' => 'Cashier',
            'lastname' => 'Cashier',
            'gender' => 'F',
            'email' => 'cashier@gmail.com',
            'password' => $password,
            'cover_image' => 'female.jpg',
            'status' => '1',
            'remember_token' => Str::random(10),
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('users')->insert([
            'id' => '20230004',
            'role' => 'guidance',
            'firstname' => 'Guidance',
            'lastname' => 'Guidance',
            'gender' => 'F',
            'email' => 'guidance@gmail.com',
            'password' => $password,
            'cover_image' => 'female.jpg',
            'status' => '1',
            'remember_token' => Str::random(10),
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('users')->insert([
            'id' => '20230005',
            'role' => 'student',
            'firstname' => 'College',
            'lastname' => 'Student',
            'gender' => 'M',
            'email' => 'college@gmail.com',
            'password' => $password,
            'cover_image' => 'male.jpg',
            'status' => '1',
            'remember_token' => Str::random(10),
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('users')->insert([
            'id' => '20230006',
            'role' => 'student',
            'firstname' => 'Senior',
            'lastname' => 'Student',
            'gender' => 'M',
            'email' => 'senior@gmail.com',
            'password' => $password,
            'cover_image' => 'male.jpg',
            'status' => '1',
            'remember_token' => Str::random(10),
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);
    }
}
