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
            'name' => 'CATEGORIA 1',
            'description' => 'Es una multidisciplina en asuntos de protección, seguridad, salud y bienestar de las personas involucradas en el trabajo.'
        ]);
    }
}
