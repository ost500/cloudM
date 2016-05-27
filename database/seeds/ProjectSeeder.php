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
                'area' =>"광고 의뢰",
                'category' => "의료",
                'title' => "GMLAB".$i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '검수',
                'Client_id' => $i,
                'intro' => "네이버 광고를 이용해 매출 20% 신장을 목표로 하고 있습니다. 페이스북도 좋습니다.",
                'budget' => 10000000,
                'estimated_duration' => "2016-12-25"
            ]);
            DB::table('projects')->insert([
                'area' =>"광고 의뢰",
                'category' => "법률",
                'title' => "GMLAB".$i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '게시',
                'Client_id' => $i,
                'intro' => "네이버 광고를 이용해 매출 20% 신장을 목표로 하고 있습니다. 페이스북도 좋습니다.",
                'budget' => 10000000,
                'estimated_duration' => "2016-12-25"
            ]);
            DB::table('projects')->insert([
                'area' =>"광고 의뢰",
                'category' => "스타트업",
                'title' => "GMLAB".$i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '미팅',
                'Client_id' => $i,
                'intro' => "네이버 광고를 이용해 매출 20% 신장을 목표로 하고 있습니다. 페이스북도 좋습니다.",
                'budget' => 10000000,
                'estimated_duration' => "2016-12-25"
            ]);
            DB::table('projects')->insert([
                'area' =>"1회성 프로젝트",
                'category' => "프랜차이즈",
                'title' => "GMLAB".$i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '계약',
                'Client_id' => $i,
                'intro' => "네이버 광고를 이용해 매출 20% 신장을 목표로 하고 있습니다. 페이스북도 좋습니다.",
                'budget' => 10000000,
                'estimated_duration' => "2016-12-25"
            ]);
            DB::table('projects')->insert([
                'area' =>"1회성 프로젝트",
                'category' => "법률",
                'title' => "GMLAB".$i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '대금지급',
                'Client_id' => $i,
                'intro' => "네이버 광고를 이용해 매출 20% 신장을 목표로 하고 있습니다. 페이스북도 좋습니다.",
                'budget' => 10000000,
                'estimated_duration' => "2016-12-25"
            ]);
            DB::table('projects')->insert([
                'area' =>"1회성 프로젝트",
                'category' => "스타트업",
                'title' => "GMLAB".$i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '검수',
                'Client_id' => $i,
                'intro' => "네이버 광고를 이용해 매출 20% 신장을 목표로 하고 있습니다. 페이스북도 좋습니다.",
                'budget' => 10000000,
                'estimated_duration' => "2016-12-25"
            ]);
            DB::table('projects')->insert([
                'area' =>"Viral",
                'category' => "프랜차이즈",
                'title' => "GMLAB".$i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '완료',
                'Client_id' => $i,
                'intro' => "네이버 광고를 이용해 매출 20% 신장을 목표로 하고 있습니다. 페이스북도 좋습니다.",
                'budget' => 10000000,
                'estimated_duration' => "2016-12-25"
            ]);
            DB::table('projects')->insert([
                'area' =>"Viral",
                'category' => "교육/대학교",
                'title' => "GMLAB".$i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '검수',
                'Client_id' => $i,
                'intro' => "네이버 광고를 이용해 매출 20% 신장을 목표로 하고 있습니다. 페이스북도 좋습니다.",
                'budget' => 10000000,
                'estimated_duration' => "2016-12-25"
            ]);
            DB::table('projects')->insert([
                'area' =>"운영 대행",
                'category' => "쇼핑몰",
                'title' => "GMLAB".$i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '검수',
                'Client_id' => $i,
                'intro' => "네이버 광고를 이용해 매출 20% 신장을 목표로 하고 있습니다. 페이스북도 좋습니다.",
                'budget' => 10000000,
                'estimated_duration' => "2016-12-25"
            ]);
            DB::table('projects')->insert([
                'area' =>"운영 대행",
                'category' => "기타",
                'title' => "GMLAB".$i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '검수',
                'Client_id' => $i,
                'intro' => "네이버 광고를 이용해 매출 20% 신장을 목표로 하고 있습니다. 페이스북도 좋습니다.",
                'budget' => 10000000,
                'estimated_duration' => "2016-12-25"
            ]);
        }
    }
}
