<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('Asia/Manila');
        
        DB::table('students')->insert([
            'id' => floor(time()-999999999),
            'user_id' => '20230005',
            'course_id' => '1001',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('students')->insert([
            'user_id' => '20230006',
            'course_id' => '101',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

    }
}
