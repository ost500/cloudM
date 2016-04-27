<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'category' => "운영 대행",
            'title' => "GMLAB"
            
        ]);
    }
}
