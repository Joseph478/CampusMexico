<?php

use App\Test;
use Illuminate\Database\Seeder;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //classrooom1
        Test::create([
            'classroom_id' => 1,
            'name' => 'Examen Inicio',
            'random' => 1,
            'time' => '00:20:00',
            'tried' => 1,
            'save_tried' => 0,
            'start_date' => '2020-11-26 00:00:00',
            'end_date' => '2020-11-30 00:00:00',
            'number_question' => 10,
            'type'=> 1,
            'is_qualified' => 0,
            'grade_max' => 20,
            'state'=>1
        ]);
        Test::create([
            'classroom_id' => 1,
            'name' => 'Examen Final',
            'random' => 1,
            'time' => '00:20:00',
            'tried' => 2,
            'save_tried' => 0,
            'start_date' => '2020-11-26 00:00:00',
            'end_date' => '2020-11-30 00:00:00',
            'number_question' => 10,
            'type'=> 0,
            'is_qualified' => 1,
            'grade_max' => 20,
            'state'=>1
        ]);

    }
}
