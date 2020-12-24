<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'SEGURIDAD Y SALUD OCUPACIONAL',
            'description' => 'Es una multidisciplina en asuntos de protección, seguridad, salud y bienestar de las personas involucradas en el trabajo.'
        ]);

        Category::create([
            'name'=>'MEDIO AMBIENTE',
            'description'=>'La actividad minera, como la mayor parte de las actividades que el hombre realiza para su subsistencia, crea alteraciones en el medio natural, desde las más imperceptibles hasta las representan claros impactos sobre el medio en que se desarrollan.'
        ]);
    }
}
