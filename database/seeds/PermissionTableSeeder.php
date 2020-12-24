<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'company-list',
            'company-create',
            'company-edit',
            'company-delete',

            'classroom-mine',
            'classroom-list',
            'classroom-create',
            'classroom-edit',
            'classroom-delete',
            'classroom-show',
            'classroom-consolidated',

            'category-list',
            'category-create',
            'category-edit',
            'category-delete',

            'course-mine',
            'course-list',
            'course-create',
            'course-edit',
            'course-delete',

            'inscription-assistance',
            'inscription-mine',
            'inscription-list',
            'inscription-show',
            'inscription-create',
            'inscription-edit',
            'inscription-delete',

            'facilitator-list',
            'facilitator-create',
            'facilitator-edit',
            'facilitator-delete',

            'contratista-list',
            'contratista-create',
            'contratista-edit',
            'contratista-delete',

            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'participant-list',
            'participant-create',
            'participant-edit',
            'participant-delete',


            'bank-list',
            'bank-create',
            'bank-edit',
            'bank-delete',

            'type-list',
            'type-create',
            'type-edit',
            'type-delete',

            'certificate-list',
            'certificate-create',
            'certificate-edit',
            'certificate-delete',
            'certificate-mine',

            'test-list',
            'test-create',
            'test-edit',
            'test-delete',
            'test-mine',
            //modulos
            'module-list',
            'module-create',
            'module-edit',
            'module-delete',

            'meeting-list',
            'meeting-create',
            'meeting-edit',
            'meeting-delete',

            'testuser-list',
            'testuser-create',
            'testuser-edit',
            'testuser-delete',

            'course-test-list',
            'course-test-create',
            'course-test-edit',
            'course-test-delete',
            'course-test-mine',

            'forum-list',
            'forum-create',
            'forum-edit',
            'forum-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::Create(['name' => $permission]);
        }
    }
}
