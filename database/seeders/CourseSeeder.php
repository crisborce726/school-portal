<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('Asia/Manila');

        DB::table('courses')->insert([
            'id' => '101',
            'course_code' => 'CGNCII',
            'course_title' => 'Caregiving NCII',
            'level' => 'Senior High',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('courses')->insert([
            'id' => '102',
            'course_code' => 'HRSNCII',
            'course_title' => 'Hotel and Restaurant Services NCII',
            'level' => 'Senior High',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('courses')->insert([
            'id' => '103',
            'course_code' => 'CSSNCII',
            'course_title' => 'Coputer System Servicing NCII',
            'level' => 'Senior High',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('courses')->insert([
            'id' => '104',
            'course_code' => 'TVL',
            'course_title' => 'Technical Vocational Livelihooh',
            'level' => 'Senior High',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('courses')->insert([
            'id' => '105',
            'course_code' => 'STEM',
            'course_title' => 'Science, TEchnology, Engineering and Mathematics',
            'level' => 'Senior High',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('courses')->insert([
            'id' => '106',
            'course_code' => 'HUMSS',
            'course_title' => 'Humanities and Social Science',
            'level' => 'Senior High',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('courses')->insert([
            'id' => '107',
            'course_code' => 'ABM',
            'course_title' => 'Accountancy,  Business and Management',
            'level' => 'Senior High',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('courses')->insert([
            'id' => '1001',
            'course_code' => 'BSIT',
            'course_title' => 'BS in Information Technology',
            'level' => 'College',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('courses')->insert([
            'id' => '1002',
            'course_code' => 'BSCS',
            'course_title' => 'BS in Computer Science',
            'level' => 'College',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('courses')->insert([
            'id' => '1003',
            'course_code' => 'BSCE',
            'course_title' => 'BS in Computer Engineering',
            'level' => 'College',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);        

        DB::table('courses')->insert([
            'id' => '1004',
            'course_code' => 'BSHRM',
            'course_title' => 'BS in Computer Science',
            'level' => 'College',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('courses')->insert([
            'id' => '1005',
            'course_code' => 'BSOA',
            'course_title' => 'BS in Hotel and Restaurant Management',
            'level' => 'College',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('courses')->insert([
            'id' => '1006',
            'course_code' => 'BSBA',
            'course_title' => 'BS in Business Administration',
            'level' => 'College',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('courses')->insert([
            'id' => '1007',
            'course_code' => 'BSCRIM',
            'course_title' => 'BS in Criminology',
            'level' => 'College',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('courses')->insert([
            'id' => '1008',
            'course_code' => 'BSHM',
            'course_title' => 'BS in Hospitality Management',
            'level' => 'College',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);
    }
}
