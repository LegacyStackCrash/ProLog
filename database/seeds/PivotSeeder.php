<?php

use Illuminate\Database\Seeder;

class PivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1, 300) as $index)
        {
            if($index < 30){
                DB::table('departments_user')->insert([
                    'departments_id' => rand(1,12),
                    'user_id' => rand(1,15),
                ]);
            }

            DB::table('departments_issues')->insert([
                'issues_id' => rand(1,150),
                'departments_id' => rand(1,12),
            ]);

            DB::table('issues_user')->insert([
                'issues_id' => rand(1,150),
                'user_id' => rand(1,15),
            ]);

            DB::table('departments_projects')->insert([
                'projects_id' => rand(1,150),
                'departments_id' => rand(1,12),
            ]);

            DB::table('projects_user')->insert([
                'projects_id' => rand(1,150),
                'user_id' => rand(1,15),
            ]);
        }
    }
}
