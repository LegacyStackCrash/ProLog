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
        $this->call(UsersSeeder::class);
        $this->call(DepartmentsSeeder::class);
        $this->call(CustomersSeeder::class);
        $this->call(IssuesSeeder::class);
        $this->call(ProjectsSeeder::class);
        $this->call(PivotSeeder::class);
    }
}
