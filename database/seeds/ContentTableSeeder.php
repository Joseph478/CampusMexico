<?php

use Illuminate\Database\Seeder;
use App\Content;

class ContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Content::create([
            'course_id' => 1,
            'type_id' => 1,
            'name' => 'Modulo 1',
            'description' => 'Aprenderás a editar videos de forma profesional',
            'order' => 1,
        ]);
    }
}
