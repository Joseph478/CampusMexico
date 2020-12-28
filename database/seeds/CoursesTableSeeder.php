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
            'name' => 'IMPORTANCIA DE LOS MONITOREOS DE SSO Y M.AMBIENTE',
            'grade_min'=>'16.00',
            'description'=>'Las empresas pueden tomar
            acciones preventivas o
            planes de mejora para
            asegurar la salud de sus
            trabajadores a corto y largo
            plazo y la de su entorno
            teniendo como base los
            resultados de sus monitoreos
            en SSOMA.',
            'hour'=> 2,
            'validity' => 1,
            'type_validity' => 1
        ]);

        Course::create([
            'category_id' => 1,
            'name' => 'CUMPLIMIENTO DEL MARCO NORMATIVO LEGAL EN SSO Y AMBIENTE',
            'grade_min'=>'16.00',
            'description'=>'Dentro del medio laboral, el
            trabajador interactúa con
            diferencias condiciones de trabajo
            que pueden afectarlo positiva o
            negativamente. Por eso se dice
            que el trabajo puede convertirse
            en un instrumento tanto de salud
            como de enfermedades para el
            individuo, la entidad y la sociedad.',
            'hour'=> 2,
            'validity' => 1,
            'type_validity' => 1
        ]);
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
