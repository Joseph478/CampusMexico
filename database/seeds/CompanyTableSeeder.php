<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'ruc' => '20508931621',
            'name' => 'INVERITAS GLOBAL HOLDINGS PERU SA',
            'address' => 'Av. La Encalada 1257 - Of: 801 - Surco',
            'state' => 1,
        ]);

        Company::create([
            'ruc' => '20100147514',
            'name' => 'GRUPO MEXICO',
            'address' => 'Av. Caminos del Inca Nro. 171 Chacarilla del Estanque - Santiago de Surco, Lima, Perú',
            'state' => 1,
        ]);
    }
}
