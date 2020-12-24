
<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root = Role::create(['name' => 'administrador']);
        $contratista = Role::create(['name' => 'contratista']);
        $participante = Role::create(['name' => 'participante']);
        //
        $facilitador = Role::create(['name' => 'facilitador']);

    }
}
