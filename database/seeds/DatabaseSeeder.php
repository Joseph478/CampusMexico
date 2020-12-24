<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'users',
            'categories',
            'types',
            'courses',
            'contents',
            'companies',
        ]);

        $this->call(CompanyTableSeeder::class);
        $this->call(TypeTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(ContentTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(BankTableSeeder::class);


        // factory(\App\User::class, 50)
        //     ->create()
        //     ->each(function ($user) {
        //         // $user->companies()->save();
        //         $company = \App\Company::inRandomOrder()->first();
        //         $user->companies()->attach($company->id);
        //         $user->assignRole(['participante']);
        //     });
        /*
        factory(\App\User::class, 50)
            ->create()
            ->each(function ($user) {
            $user->assignRole(['participante']);
        });*/
    }

    protected function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach($tables as $table){
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
