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
