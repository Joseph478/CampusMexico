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
            'ruc' => '20431871808',
            'name' => 'PERURAIL S.A.',
            'address' => 'v. Armendariz Nro. 480 Int. 402 - Miraflores, Lima, Perú',
            'state' => 1,
        ]);

        Company::create([
            'ruc' => '20432747833',
            'name' => 'FERROCARRIL TRANSANDINO S.A.',
            'address' => 'Av. Armendariz Nro. 480 Int. 402 - Miraflores, Lima, Perú',
            'state' => 1,
        ]);
    }
}
