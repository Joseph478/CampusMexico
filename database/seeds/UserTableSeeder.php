<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'company_id' => 1,
            'dni' => '72974767',
            'name'=>'admin',
            'last_name'=>'igh',
            'email'=>'admin@mail.com',
            'password'=> bcrypt('root'),
        ]);
        $participant = User::create([
            'company_id' => 1,
            'dni' => '46185127',
            'name'=>'Henrry',
            'last_name'=>'sairitupac arones',
            'email'=>'henrry.sairitupac@ighgroup.com',
            'password'=> bcrypt('root'),
        ]);
        $contrata_melissa = User::create([
            'company_id' => 2,
            'dni' => '45882055',
            'name'=>'FABIOLA MELISSA',
            'last_name'=>'QUISPE SALCEDO',
            'email'=>'fquispe@perurail.com',
            'password'=> bcrypt('45882055'),
        ]);
        $contrata = User::create([
            'company_id' => 1,
            'dni' => '11221122',
            'name'=>'jose',
            'last_name'=>'paredes chiara',
            'email'=>'jose@ighgroup.com',
            'password'=> bcrypt('root'),
        ]);
        $facilitator = User::create([
            'company_id' => 1,
            'dni' => '00000001',
            'name'=>'Angelica',
            'last_name'=>'Fonseca',
            'email'=>'angelica@ighgroup.com',
            'password'=> bcrypt('11221133'),
        ]);

        $admin_permissions = Permission::pluck('id', 'id')->all();

        $participant_permissions = Permission::where('permissions.name','=', 'course-mine')
        ->orWhere('permissions.name','like', '%' .'certificate-mine'. '%')->pluck('id', 'id');

        $contrata_permissions = Permission::where('permissions.name','like', '%' .'inscription'. '%')
        ->orWhere('permissions.name','like', '%' .'participant'. '%')
        ->orWhere('permissions.name', '=', 'classroom-list')->pluck('id', 'id');

        $facilitator_permissions = Permission::where('permissions.name','like', '%' .'course'. '%')
        ->orWhere('permissions.name','=', 'classroom-list')
        ->orWhere('permissions.name','=', 'classroom-consolidated')
        ->pluck('id', 'id');

        //admin
        $role = Role::findByName('administrador');
        $role->syncPermissions($admin_permissions);
        $role->revokePermissionTo('course-mine');
        $role->revokePermissionTo('classroom-mine');
        $role->revokePermissionTo('inscription-mine');
        $role->revokePermissionTo('inscription-assistance');
        $admin->assignRole([$role->id]);
        //$admin->companies()->attach('1');

        // contratistas
        $rol = Role::findByName('contratista');
        $rol->syncPermissions($contrata_permissions);
        $contrata->assignRole([$rol->id]);
        $contrata_melissa->assignRole([$rol->id]);

        //$contrata->companies()->attach('1');

        // participantes
        $roles = Role::findByName('participante');
        $roles->syncPermissions($participant_permissions);
        $roles->givePermissionTo('test-list');
        $roles->givePermissionTo('course-test-mine');
        $participant->assignRole([$roles->id]);
        //$participant->companies()->attach('1');

        // facilitador
        $rols= Role::findByName('facilitador');
        $rols->syncPermissions($facilitator_permissions);
        $rols->revokePermissionTo('course-mine');
        $rols->givePermissionTo('inscription-assistance');
        //$facilitators->companies()->attach('1');
        $facilitator->assignRole([$rols->id]);
        //$facilitator->companies()->attach('1');


    }
}
