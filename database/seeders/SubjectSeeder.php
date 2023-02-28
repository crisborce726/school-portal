<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('Asia/Manila');

        //First Sem for Caregiving NCII Grade 11
        DB::table('subjects')->insert([
            'subject_code' => 'ORALCOM',
            'subject_title' => 'Oracl Communication',
            'level' => '11',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'KUMPIL',
            'subject_title' => 'Kumunikasyon at Pananaliksik sa Wika at Kulturang Pilipino',
            'level' => '11',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'GENMATH',
            'subject_title' => 'Generaml Mathematics',
            'level' => '11',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'EARTHSCI',
            'subject_title' => 'Earth and Life Science',
            'level' => '11',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'PEHEALTH1',
            'subject_title' => 'Physical Education and Health',
            'level' => '11',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'PERDEV',
            'subject_title' => 'Personal Development',
            'level' => '11',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'ENTRE',
            'subject_title' => 'Entrepreneurship',
            'level' => '11',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'PROINTOF',
            'subject_title' => 'Provide Care and Support to Infant ans Toddlers',
            'level' => '11',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'PROSUCHIL',
            'subject_title' => 'Provide Care and Support to Children',
            'level' => '11',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem for Caregiving NCII Grade 11
        DB::table('subjects')->insert([
            'subject_code' => 'READWRI',
            'subject_title' => 'Reading and Writing',
            'level' => '11',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'PAGBASA',
            'subject_title' => 'Pagbasa at Pagpuri ng Ibat Ibang Tekso Tungo sa Pananaliksik',
            'level' => '11',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'PHILLIT',
            'subject_title' => '21st Century Literature from the Philippines and the Wolrd',
            'level' => '11',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'STAT',
            'subject_title' => 'Statistics and Probability',
            'level' => '11',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'PEHEALTH2',
            'subject_title' => 'Physical Education and Health',
            'level' => '11',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'PHYLSCI',
            'subject_title' => 'Physical Science',
            'level' => '11',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'PRACRE1',
            'subject_title' => 'Practical Reseach 1',
            'level' => '11',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'SOCIALDEV',
            'subject_title' => 'Foster Social, Intelectual, Creative and Emotional Develpment of Children',
            'level' => '11',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'PHYLDEV',
            'subject_title' => 'Foster Physical Develpment of Children',
            'level' => '11',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem for Caregiving NCII Grade 12
        DB::table('subjects')->insert([
            'subject_code' => 'MEDLIT',
            'subject_title' => 'Media & Information Literacy',
            'level' => '12',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'INTROTOPHIL',
            'subject_title' => 'Introduction to Philosophy of the Human Person',
            'level' => '12',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'PEHEALTH3',
            'subject_title' => 'Physical Education and Health',
            'level' => '12',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'UNCULSOPOL',
            'subject_title' => 'Understanding Culture, Society and Politics',
            'level' => '12',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'ENGACAD',
            'subject_title' => 'English for Academimc and Professional Ue',
            'level' => '12',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'PRACRE2',
            'subject_title' => 'Practical Reseacher 2',
            'level' => '12',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'FILAKAD',
            'subject_title' => 'Filipino sa Piling-Akademic',
            'level' => '12',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'PROELDER',
            'subject_title' => 'Provide Care and Support to Elderly',
            'level' => '12',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'PROSPE',
            'subject_title' => 'Provide Care and Support to People with Special Needs',
            'level' => '12',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'RESEMER',
            'subject_title' => 'Respond to Emergencies',
            'level' => '12',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //FirsSecondt Sem for Caregiving NCII Grade 12
        DB::table('subjects')->insert([
            'subject_code' => 'CONPHIL',
            'subject_title' => 'Contemporary Philippines Arts from the Regions',
            'level' => '12',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'PEHEALTH4',
            'subject_title' => 'Physical Education and Health',
            'level' => '12',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'EMPOTECH',
            'subject_title' => 'Empowering Technologies',
            'level' => '12',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'III',
            'subject_title' => 'Inquiries, Investigation and Immersion',
            'level' => '12',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'PERSHOUSE',
            'subject_title' => 'Perform Housekeeping Activites',
            'level' => '12',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'PREMEAL',
            'subject_title' => 'Prepare Hot and Cold Meals',
            'level' => '12',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('subjects')->insert([
            'subject_code' => 'WORKCARE',
            'subject_title' => 'Work Immersion, Research, Career Advocary or Culminating Activity',
            'level' => '12',
            'course_id' => 101,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //=======================================================================================
        //=======================================================================================
        //=======================================================================================
        //=======================================================================================
        //=======================================================================================
        //=======================================================================================

        //First Sem BSIT-1
        DB::table('subjects')->insert([
            'subject_code' => 'GE-1',
            'subject_title' => 'Understanding the Self',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'level' => '1',
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-1
        DB::table('subjects')->insert([
            'subject_code' => 'GE-2',
            'subject_title' => 'Reading in the Philippine History',
            'level' => '1',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-1
        DB::table('subjects')->insert([
            'subject_code' => 'GE-3',
            'subject_title' => 'Thr Contemporary World',
            'level' => '1',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-1
        DB::table('subjects')->insert([
            'subject_code' => 'GE-4',
            'subject_title' => 'Art Appreciation',
            'level' => '1',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-1
        DB::table('subjects')->insert([
            'subject_code' => 'GE-5',
            'subject_title' => 'Mathematics in the Modern World',
            'level' => '1',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-1
        DB::table('subjects')->insert([
            'subject_code' => 'GE-6',
            'subject_title' => 'Science, Technology and Society',
            'level' => '1',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-1
        DB::table('subjects')->insert([
            'subject_code' => 'ITW111',
            'subject_title' => 'Intro to Information Technology and Manangment',
            'level' => '1',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-1
        DB::table('subjects')->insert([
            'subject_code' => 'PE1',
            'subject_title' => 'Self-Traning Activities',
            'level' => '1',
            'lec_unit' => '2',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-1
        DB::table('subjects')->insert([
            'subject_code' => 'NSTP1',
            'subject_title' => 'Civic Welfare Training Services 1',
            'level' => '1',
            'lec_unit' => '2',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-1
        DB::table('subjects')->insert([
            'subject_code' => 'GE-7',
            'subject_title' => 'Purposive Communication',
            'level' => '1',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-1
        DB::table('subjects')->insert([
            'subject_code' => 'GE-8',
            'subject_title' => 'Ethics',
            'level' => '1',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-1
        DB::table('subjects')->insert([
            'subject_code' => 'GE-9',
            'subject_title' => 'Rizals Life and Works',
            'level' => '1',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-1
        DB::table('subjects')->insert([
            'subject_code' => 'GE-10',
            'subject_title' => 'Living in the IT Era',
            'level' => '1',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-1
        DB::table('subjects')->insert([
            'subject_code' => 'GE-11',
            'subject_title' => 'Philippine Popular Culture',
            'level' => '1',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-1
        DB::table('subjects')->insert([
            'subject_code' => 'GE-12',
            'subject_title' => 'The Entreprenurial Mind',
            'level' => '1',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-1
        DB::table('subjects')->insert([
            'subject_code' => 'SA121',
            'subject_title' => 'EthicsSoftware Application (Word/Excel/Powerpoint)',
            'level' => '1',
            'lec_unit' => '2',
            'lab_unit' => '1',
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-1
        DB::table('subjects')->insert([
            'subject_code' => 'PE2',
            'subject_title' => 'Individual Sports',
            'level' => '1',
            'lec_unit' => '2',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-1
        DB::table('subjects')->insert([
            'subject_code' => 'NSTP2',
            'subject_title' => 'Civil Welfare Traning Services 2',
            'level' => '1',
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);


        //=======================================================================================
        //=======================================================================================
        //=======================================================================================
        //=======================================================================================
        //=======================================================================================
        //=======================================================================================


        //First Sem BSIT-2
        DB::table('subjects')->insert([
            'subject_code' => 'NATSCI211',
            'subject_title' => 'General Science (Chemistry and Biology)',
            'level' => '2',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);
        //First Sem BSIT-2
        DB::table('subjects')->insert([
            'subject_code' => 'HUMAN211',
            'subject_title' => 'Philisophy (Logic)',
            'level' => '2',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-2
        DB::table('subjects')->insert([
            'subject_code' => 'ITW211',
            'subject_title' => 'Object Oriented Programming (C++)',
            'level' => '2',
            'lec_unit' => '2',
            'lab_unit' => '1',
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-2
        DB::table('subjects')->insert([
            'subject_code' => 'ITW212',
            'subject_title' => 'Computer Programming 1 (Java)',
            'level' => '2',
            'lec_unit' => '2',
            'lab_unit' => "1",
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-2
        DB::table('subjects')->insert([
            'subject_code' => 'ITW213',
            'subject_title' => 'Computer Architecture and Organization with Assembly',
            'level' => '2',
            'lec_unit' => '2',
            'lab_unit' => "1",
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-2
        DB::table('subjects')->insert([
            'subject_code' => 'ITW214',
            'subject_title' => 'Database Management System (ER/SQL)',
            'level' => '2',
            'lec_unit' => '2',
            'lab_unit' => "1",
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-2
        DB::table('subjects')->insert([
            'subject_code' => 'ITW215',
            'subject_title' => 'Discrete Mathematics',
            'level' => '2',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-2
        DB::table('subjects')->insert([
            'subject_code' => 'NATSCI212',
            'subject_title' => 'Physics 1',
            'level' => '2',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-2
        DB::table('subjects')->insert([
            'subject_code' => 'PE3',
            'subject_title' => 'Rythmic Activites',
            'level' => '2',
            'lec_unit' => '2',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-2
        DB::table('subjects')->insert([
            'subject_code' => 'SOCSCI221',
            'subject_title' => 'General Psychology',
            'level' => '2',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-2
        DB::table('subjects')->insert([
            'subject_code' => 'SOCSCI222',
            'subject_title' => 'Principles of Economics with TAR',
            'level' => '2',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-2
        DB::table('subjects')->insert([
            'subject_code' => 'ITW221',
            'subject_title' => 'Data Structure and Algorithms Analysis',
            'level' => '2',
            'lec_unit' => '2',
            'lab_unit' => '1',
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-2
        DB::table('subjects')->insert([
            'subject_code' => 'ITW222',
            'subject_title' => 'Graphics & Layouting (Adobe Photoshop / inDesign)',
            'level' => '2',
            'lec_unit' => '2',
            'lab_unit' => '1',
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-2
        DB::table('subjects')->insert([
            'subject_code' => 'ITW223',
            'subject_title' => 'Computer Programming 2 (C#.Net)',
            'level' => '2',
            'lec_unit' => '2',
            'lab_unit' => '1',
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-2
        DB::table('subjects')->insert([
            'subject_code' => 'ITW224',
            'subject_title' => 'Operating System Concepts',
            'level' => '2',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-2
        DB::table('subjects')->insert([
            'subject_code' => 'ITW225',
            'subject_title' => 'Computer Programming (Python)',
            'level' => '2',
            'lec_unit' => '2',
            'lab_unit' => '1',
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-2
        DB::table('subjects')->insert([
            'subject_code' => 'PE4',
            'subject_title' => 'Team Sports',
            'level' => '2',
            'lec_unit' => '2',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-2
        DB::table('subjects')->insert([
            'subject_code' => 'NATSCI221',
            'subject_title' => 'Physics 2',
            'level' => '2',
            'lec_unit' => '2',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);



        //=======================================================================================
        //=======================================================================================
        //=======================================================================================
        //=======================================================================================
        //=======================================================================================
        //=======================================================================================


        //First Sem BSIT-3
        DB::table('subjects')->insert([
            'subject_code' => 'ACCTG311',
            'subject_title' => 'Fundametnals of Accounting',
            'level' => '3',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-3
        DB::table('subjects')->insert([
            'subject_code' => 'SOCSCI311',
            'subject_title' => 'Sociology with Pop. Ed. & Drug Prevention',
            'level' => '3',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-3
        DB::table('subjects')->insert([
            'subject_code' => 'ITW311',
            'subject_title' => 'Linux Operating System',
            'level' => '3',
            'lec_unit' => '2',
            'lab_unit' => '1',
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-3
        DB::table('subjects')->insert([
            'subject_code' => 'ITW312',
            'subject_title' => 'Digital Circuit',
            'level' => '3',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-3
        DB::table('subjects')->insert([
            'subject_code' => 'ITW313',
            'subject_title' => 'Hardware & Software Installation',
            'level' => '3',
            'lec_unit' => '2',
            'lab_unit' => '1',
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-3
        DB::table('subjects')->insert([
            'subject_code' => 'ITW314',
            'subject_title' => 'Data Communications & Networking',
            'level' => '3',
            'lec_unit' => '2',
            'lab_unit' => '1',
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-3
        DB::table('subjects')->insert([
            'subject_code' => 'ITW315',
            'subject_title' => 'Management Information System',
            'level' => '3',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-3
        DB::table('subjects')->insert([
            'subject_code' => 'ITW316',
            'subject_title' => 'Software Engineering',
            'level' => '3',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-3
        DB::table('subjects')->insert([
            'subject_code' => 'ITW321',
            'subject_title' => 'System Analysis and Design',
            'level' => '3',
            'lec_unit' => '2',
            'lab_unit' => '1',
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-3
        DB::table('subjects')->insert([
            'subject_code' => 'ITW322',
            'subject_title' => 'Computer Programming 4 (Web Design and development)',
            'level' => '3',
            'lec_unit' => '2',
            'lab_unit' => '1',
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-3
        DB::table('subjects')->insert([
            'subject_code' => 'ITW323',
            'subject_title' => 'Systems Administration and Maintenance',
            'level' => '3',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-3
        DB::table('subjects')->insert([
            'subject_code' => 'ITW324',
            'subject_title' => 'Business Analytics',
            'level' => '3',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-3
        DB::table('subjects')->insert([
            'subject_code' => 'ITW325',
            'subject_title' => 'Information Assurance and Security',
            'level' => '3',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-3
        DB::table('subjects')->insert([
            'subject_code' => 'ITW326',
            'subject_title' => 'Project Manangment',
            'level' => '3',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-3
        DB::table('subjects')->insert([
            'subject_code' => 'ITW327',
            'subject_title' => 'Professional Ethics in IT and Comp. Issues',
            'level' => '3',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-3
        DB::table('subjects')->insert([
            'subject_code' => 'ITW328',
            'subject_title' => 'Programming 5 (Visual Basic 2010 .Net',
            'level' => '3',
            'lec_unit' => '2',
            'lab_unit' => '1',
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);


        //=======================================================================================
        //=======================================================================================
        //=======================================================================================
        //=======================================================================================
        //=======================================================================================
        //=======================================================================================

        //First Sem BSIT-4
        DB::table('subjects')->insert([
            'subject_code' => 'ITW411',
            'subject_title' => 'Capstone Project - 1',
            'level' => '4',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-4
        DB::table('subjects')->insert([
            'subject_code' => 'ITW412',
            'subject_title' => 'Mobile Technology',
            'level' => '4',
            'lec_unit' => '2',
            'lab_unit' => '1',
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-4
        DB::table('subjects')->insert([
            'subject_code' => 'ITWELEC1',
            'subject_title' => 'Integrative Programming Techonologies',
            'level' => '4',
            'lec_unit' => '2',
            'lab_unit' => '1',
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-4
        DB::table('subjects')->insert([
            'subject_code' => 'ITWELEC2',
            'subject_title' => 'Systems Integration and Architecture',
            'level' => '4',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-4
        DB::table('subjects')->insert([
            'subject_code' => 'ITWELEC3',
            'subject_title' => 'Special Topics IT (Multimedia)',
            'level' => '4',
            'lec_unit' => '2',
            'lab_unit' => '1',
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //First Sem BSIT-4
        DB::table('subjects')->insert([
            'subject_code' => 'ITW413',
            'subject_title' => 'Seminars and Workshop',
            'level' => '4',
            'lec_unit' => '2',
            'lab_unit' => '1',
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);


        //Second Sem BSIT-4
        DB::table('subjects')->insert([
            'subject_code' => 'ITW421',
            'subject_title' => 'Capstone Project - 2',
            'level' => '4',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-4
        DB::table('subjects')->insert([
            'subject_code' => 'ITWELEC4',
            'subject_title' => 'Human Computer Interaction',
            'level' => '4',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-4
        DB::table('subjects')->insert([
            'subject_code' => 'ITWELEC5',
            'subject_title' => 'Web Enhanced Animation Graphics',
            'level' => '4',
            'lec_unit' => '2',
            'lab_unit' => '1',
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        //Second Sem BSIT-4
        DB::table('subjects')->insert([
            'subject_code' => 'ITW422',
            'subject_title' => 'IT Practicum (Minimum of 468 hours)',
            'level' => '4',
            'lec_unit' => '3',
            'lab_unit' => NULL,
            'course_id' => 1001,
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);
    }
}
