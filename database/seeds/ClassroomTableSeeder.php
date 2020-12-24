<?php

use App\Classroom;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ClassroomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classroom::create([
            'course_id'=> 1,
            'user_id' =>2,
            'type' => 'regular',
            'start_datetime' => Carbon::parse('01-01-2021 08:00:00')->format('Y-m-d H:i:s'),
            'end_datetime' => Carbon::parse('01-01-2021 08:00:00')->format('Y-m-d H:i:s'),
            'vacancies' => 40,
            'modality' => 'virtual',
            'test_begin_required' => 1,
            'is_free' =>0,
            'name' =>'IMPORTANCIA DE LOS MONITOREOS DE SSO Y M.AMBIENTE',
            'hour' =>2,
            'grade_min' =>16,
            'validity' =>1,
            'type_validity' =>1
        ]);

        Classroom::create([
            'course_id'=> 2,
            'user_id' =>2,
            'type' => 'regular',
            'start_datetime' => Carbon::parse('01-01-2021 08:00:00')->format('d-m-Y'),
            'end_datetime' => Carbon::parse('01-01-2021 08:00:00')->format('d-m-Y'),
            'vacancies' => 40,
            'modality' => 'virtual',
            'test_begin_required' => 1,
            'is_free' =>0,
            'name' =>'CUMPLIMIENTO DEL MARCO NORMATIVO LEGAL EN SSO Y AMBIENTE',
            'hour' =>2,
            'grade_min' =>16,
            'validity' =>1,
            'type_validity' =>1
        ]);
        Classroom::create([
            'course_id'=> 3,
            'user_id' =>2,
            'type' => 'regular',
            'start_datetime' => Carbon::parse('01-01-2021 08:00:00')->format('Y-m-d H:i:s'),
            'end_datetime' => Carbon::parse('01-01-2021 08:00:00')->format('Y-m-d H:i:s'),
            'vacancies' => 40,
            'modality' => 'virtual',
            'test_begin_required' => 1,
            'is_free' =>0,
            'name' =>'SEGURIDAD BASADA EN ELCOMPORTAMIENTO',
            'hour' =>2,
            'grade_min' =>16,
            'validity' =>1,
            'type_validity' =>1
        ]);
    }
}
