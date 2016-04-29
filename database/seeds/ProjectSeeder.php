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
        for ($i = 1; $i < 15; $i++) {

            DB::table('projects')->insert([
                'category' => "광고 의뢰",
                'title' => "GMLAB".$i
            ]);
            DB::table('projects')->insert([
                'category' => "운영 대행",
                'title' => "GMLAB".$i
            ]);
            DB::table('projects')->insert([
                'category' => "Viral",
                'title' => "GMLAB".$i
            ]);
            DB::table('projects')->insert([
                'category' => "의료",
                'title' => "GMLAB".$i
            ]);
            DB::table('projects')->insert([
                'category' => "법률",
                'title' => "GMLAB".$i
            ]);
            DB::table('projects')->insert([
                'category' => "스타트업",
                'title' => "GMLAB".$i
            ]);
            DB::table('projects')->insert([
                'category' => "프랜차이즈",
                'title' => "GMLAB".$i
            ]);
            DB::table('projects')->insert([
                'category' => "교육/대학교",
                'title' => "GMLAB".$i
            ]);
            DB::table('projects')->insert([
                'category' => "쇼핑몰",
                'title' => "GMLAB".$i
            ]);
            DB::table('projects')->insert([
                'category' => "1회성 프로젝트",
                'title' => "GMLAB".$i
            ]);
        }
    }
}
