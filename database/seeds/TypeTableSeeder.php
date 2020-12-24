<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'name'=>'Modulo',
            'description'=>'Now that there is the Tec-9, a crappy spray gun from South Miami. This gun is advertised as the most '
        ]);
        Type::create([
            'name'=>'Documento',
            'description'=>'Now that there is the Tec-9, a crappy spray gun from South Miami. This gun is advertised as the most '
        ]);
        Type::create([
            'name'=>'Tarea',
            'description'=>'Do you believe that shit? It actually says that in the little book that comes with it: the most popular gun in American crime. Like they re actually proud of that shit.'
        ]);
        Type::create([
            'name'=>'Anuncio',
            'description'=>'Do you believe that shit? It actually says that in the little book that comes with it: the most popular gun in American crime. Like they re actually proud of that shit.'
        ]);
        Type::create([
            'name'=>'Videos',
            'description'=>'Do you believe that shit? It actually says that in the little book that comes with it: the most popular gun in American crime. Like they re actually proud of that shit.'
        ]);
    }
}
