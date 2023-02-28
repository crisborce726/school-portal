<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('Asia/Manila');
        
        DB::table('faculties')->insert([
            'id' => floor(time()-999999999),
            'user_id' => '20230001',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('faculties')->insert([
            'user_id' => '20230002',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('faculties')->insert([
            'user_id' => '20230003',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('faculties')->insert([
            'user_id' => '20230004',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);
    }
}
