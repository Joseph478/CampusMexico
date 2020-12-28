<?php

use Illuminate\Database\Seeder;
use App\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Course::create([
            'category_id' => 1,
            'name' => 'SEGURIDAD BASADA EN ELCOMPORTAMIENTO',
            'grade_min'=>'16.00',
            'description'=>'Valorar el impacto de las
            consecuencias positivas,
            inmediatas y certeras, para
            motivar hábitos seguros.
            ',
            'hour'=> 2,
            'validity' => 1,
            'type_validity' => 1
        ]);

    }
}
