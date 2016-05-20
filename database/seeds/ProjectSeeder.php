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
                'title' => "GMLAB".$i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '검수',
                'Client_id' => $i,
            ]);
            DB::table('projects')->insert([
                'category' => "운영 대행",
                'title' => "GMLAB".$i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '게시',
                'Client_id' => $i,
            ]);
            DB::table('projects')->insert([
                'category' => "Viral",
                'title' => "GMLAB".$i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '미팅',
                'Client_id' => $i,
            ]);
            DB::table('projects')->insert([
                'category' => "의료",
                'title' => "GMLAB".$i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '계약',
                'Client_id' => $i,
            ]);
            DB::table('projects')->insert([
                'category' => "법률",
                'title' => "GMLAB".$i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '대금지급',
                'Client_id' => $i,
            ]);
            DB::table('projects')->insert([
                'category' => "스타트업",
                'title' => "GMLAB".$i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '검수',
                'Client_id' => $i,
            ]);
            DB::table('projects')->insert([
                'category' => "프랜차이즈",
                'title' => "GMLAB".$i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '완료',
                'Client_id' => $i,
            ]);
            DB::table('projects')->insert([
                'category' => "교육/대학교",
                'title' => "GMLAB".$i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '검수',
                'Client_id' => $i,
            ]);
            DB::table('projects')->insert([
                'category' => "쇼핑몰",
                'title' => "GMLAB".$i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '검수',
                'Client_id' => $i,
            ]);
            DB::table('projects')->insert([
                'category' => "1회성 프로젝트",
                'title' => "GMLAB".$i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '검수',
                'Client_id' => $i,
            ]);
        }
    }
}
