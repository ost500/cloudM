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
                'area' => "광고 의뢰",
                'category' => "의료",
                'title' => "GMLAB" . $i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'intro' => "네이버 광고를 이용해 매출 20% 신장을 목표로 하고 있습니다. 페이스북도 좋습니다.",
                'step' => '검수',
                'Client_id' => $i,

                'budget' => 10000000,
                'estimated_duration' => "2016-12-25",

                'managing_experience' => "있음",
                'expected_start_date' => "2016-12-25",
                'meeting_way' => "온라인 미팅",
                'address_sido' => "서울특별시",



                'detail_content' => "< 프로젝트 진행 방식 >
예시) 시작시점에 미팅, 주 1회 미팅 등

< 프로젝트의 현재 상황 >
예시) 기획 여부, 컨텐츠 준비 여부, 타겟 고객, 진행 계획 등

< 상세한 업무 내용 >
예시) 사이트의 용도, 페이지 수, 레이아웃(비슷한 페이지) 수 등

< 참고자료 / 유의사항 >
예시) 참고사이트, 기타 유의사항 등 ",
                'deadline' =>\Carbon\Carbon::now()->toDateString(),


            ]);
            DB::table('projects')->insert([
                'area' => "광고 의뢰",
                'category' => "법률",
                'title' => "GMLAB" . $i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '게시',
                'Client_id' => $i,
                'intro' => "네이버 광고를 이용해 매출 20% 신장을 목표로 하고 있습니다. 페이스북도 좋습니다.",
                'budget' => 10000000,
                'estimated_duration' => "2016-12-25",

                'managing_experience' => "있음",
                'expected_start_date' => "2016-12-25",
                'meeting_way' => "온라인 미팅",
                'address_sido' => "서울특별시",



                'detail_content' => "< 프로젝트 진행 방식 >
예시) 시작시점에 미팅, 주 1회 미팅 등

< 프로젝트의 현재 상황 >
예시) 기획 여부, 컨텐츠 준비 여부, 타겟 고객, 진행 계획 등

< 상세한 업무 내용 >
예시) 사이트의 용도, 페이지 수, 레이아웃(비슷한 페이지) 수 등

< 참고자료 / 유의사항 >
예시) 참고사이트, 기타 유의사항 등 ",
                'deadline' =>\Carbon\Carbon::now()->toDateString(),

            ]);
            DB::table('projects')->insert([
                'area' => "광고 의뢰",
                'category' => "스타트업",
                'title' => "GMLAB" . $i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '미팅',
                'Client_id' => $i,
                'intro' => "네이버 광고를 이용해 매출 20% 신장을 목표로 하고 있습니다. 페이스북도 좋습니다.",
                'budget' => 10000000,
                'estimated_duration' => "2016-12-25",

                'managing_experience' => "있음",
                'expected_start_date' => "2016-12-25",
                'meeting_way' => "온라인 미팅",
                'address_sido' => "서울특별시",


                'detail_content' => "< 프로젝트 진행 방식 >
예시) 시작시점에 미팅, 주 1회 미팅 등

< 프로젝트의 현재 상황 >
예시) 기획 여부, 컨텐츠 준비 여부, 타겟 고객, 진행 계획 등

< 상세한 업무 내용 >
예시) 사이트의 용도, 페이지 수, 레이아웃(비슷한 페이지) 수 등

< 참고자료 / 유의사항 >
예시) 참고사이트, 기타 유의사항 등 ",
                'deadline' =>\Carbon\Carbon::now()->toDateString(),

            ]);
            DB::table('projects')->insert([
                'area' => "1회성 프로젝트",
                'category' => "프랜차이즈",
                'title' => "GMLAB" . $i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '계약',
                'Client_id' => $i,
                'intro' => "네이버 광고를 이용해 매출 20% 신장을 목표로 하고 있습니다. 페이스북도 좋습니다.",
                'budget' => 10000000,
                'estimated_duration' => "2016-12-25",

                'managing_experience' => "있음",
                'expected_start_date' => "2016-12-25",
                'meeting_way' => "온라인 미팅",
                'address_sido' => "서울특별시",


                'detail_content' => "< 프로젝트 진행 방식 >
예시) 시작시점에 미팅, 주 1회 미팅 등

< 프로젝트의 현재 상황 >
예시) 기획 여부, 컨텐츠 준비 여부, 타겟 고객, 진행 계획 등

< 상세한 업무 내용 >
예시) 사이트의 용도, 페이지 수, 레이아웃(비슷한 페이지) 수 등

< 참고자료 / 유의사항 >
예시) 참고사이트, 기타 유의사항 등 ",
                'deadline' =>\Carbon\Carbon::now()->toDateString(),

            ]);
            DB::table('projects')->insert([
                'area' => "1회성 프로젝트",
                'category' => "법률",
                'title' => "GMLAB" . $i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '대금지급',
                'Client_id' => $i,
                'intro' => "네이버 광고를 이용해 매출 20% 신장을 목표로 하고 있습니다. 페이스북도 좋습니다.",
                'budget' => 10000000,
                'estimated_duration' => "2016-12-25",

                'managing_experience' => "있음",
                'expected_start_date' => "2016-12-25",
                'meeting_way' => "온라인 미팅",
                'address_sido' => "서울특별시",


                'detail_content' => "< 프로젝트 진행 방식 >
예시) 시작시점에 미팅, 주 1회 미팅 등

< 프로젝트의 현재 상황 >
예시) 기획 여부, 컨텐츠 준비 여부, 타겟 고객, 진행 계획 등

< 상세한 업무 내용 >
예시) 사이트의 용도, 페이지 수, 레이아웃(비슷한 페이지) 수 등

< 참고자료 / 유의사항 >
예시) 참고사이트, 기타 유의사항 등 ",
                'deadline' =>\Carbon\Carbon::now()->toDateString(),

            ]);
            DB::table('projects')->insert([
                'area' => "1회성 프로젝트",
                'category' => "스타트업",
                'title' => "GMLAB" . $i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '검수',
                'Client_id' => $i,
                'intro' => "네이버 광고를 이용해 매출 20% 신장을 목표로 하고 있습니다. 페이스북도 좋습니다.",
                'budget' => 10000000,
                'estimated_duration' => "2016-12-25",

                'managing_experience' => "있음",
                'expected_start_date' => "2016-12-25",
                'meeting_way' => "온라인 미팅",
                'address_sido' => "서울특별시",


                'detail_content' => "< 프로젝트 진행 방식 >
예시) 시작시점에 미팅, 주 1회 미팅 등

< 프로젝트의 현재 상황 >
예시) 기획 여부, 컨텐츠 준비 여부, 타겟 고객, 진행 계획 등

< 상세한 업무 내용 >
예시) 사이트의 용도, 페이지 수, 레이아웃(비슷한 페이지) 수 등

< 참고자료 / 유의사항 >
예시) 참고사이트, 기타 유의사항 등 ",
                'deadline' =>\Carbon\Carbon::now()->toDateString(),

            ]);
            DB::table('projects')->insert([
                'area' => "Viral",
                'category' => "프랜차이즈",
                'title' => "GMLAB" . $i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '완료',
                'Client_id' => $i,
                'intro' => "네이버 광고를 이용해 매출 20% 신장을 목표로 하고 있습니다. 페이스북도 좋습니다.",
                'budget' => 10000000,
                'estimated_duration' => "2016-12-25",

                'managing_experience' => "있음",
                'expected_start_date' => "2016-12-25",
                'meeting_way' => "온라인 미팅",
                'address_sido' => "서울특별시",


                'detail_content' => "< 프로젝트 진행 방식 >
예시) 시작시점에 미팅, 주 1회 미팅 등

< 프로젝트의 현재 상황 >
예시) 기획 여부, 컨텐츠 준비 여부, 타겟 고객, 진행 계획 등

< 상세한 업무 내용 >
예시) 사이트의 용도, 페이지 수, 레이아웃(비슷한 페이지) 수 등

< 참고자료 / 유의사항 >
예시) 참고사이트, 기타 유의사항 등 ",
                'deadline' =>\Carbon\Carbon::now()->toDateString(),

            ]);
            DB::table('projects')->insert([
                'area' => "Viral",
                'category' => "교육/대학교",
                'title' => "GMLAB" . $i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '검수',
                'Client_id' => $i,
                'intro' => "네이버 광고를 이용해 매출 20% 신장을 목표로 하고 있습니다. 페이스북도 좋습니다.",
                'budget' => 10000000,
                'estimated_duration' => "2016-12-25",

                'managing_experience' => "있음",
                'expected_start_date' => "2016-12-25",
                'meeting_way' => "온라인 미팅",
                'address_sido' => "서울특별시",


                'detail_content' => "< 프로젝트 진행 방식 >
예시) 시작시점에 미팅, 주 1회 미팅 등

< 프로젝트의 현재 상황 >
예시) 기획 여부, 컨텐츠 준비 여부, 타겟 고객, 진행 계획 등

< 상세한 업무 내용 >
예시) 사이트의 용도, 페이지 수, 레이아웃(비슷한 페이지) 수 등

< 참고자료 / 유의사항 >
예시) 참고사이트, 기타 유의사항 등 ",
                'deadline' =>\Carbon\Carbon::now()->toDateString(),

            ]);
            DB::table('projects')->insert([
                'area' => "운영 대행",
                'category' => "쇼핑몰",
                'title' => "GMLAB" . $i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '검수',
                'Client_id' => $i,
                'intro' => "네이버 광고를 이용해 매출 20% 신장을 목표로 하고 있습니다. 페이스북도 좋습니다.",
                'budget' => 10000000,
                'estimated_duration' => "2016-12-25",

                'managing_experience' => "있음",
                'expected_start_date' => "2016-12-25",
                'meeting_way' => "온라인 미팅",
                'address_sido' => "서울특별시",


                'detail_content' => "< 프로젝트 진행 방식 >
예시) 시작시점에 미팅, 주 1회 미팅 등

< 프로젝트의 현재 상황 >
예시) 기획 여부, 컨텐츠 준비 여부, 타겟 고객, 진행 계획 등

< 상세한 업무 내용 >
예시) 사이트의 용도, 페이지 수, 레이아웃(비슷한 페이지) 수 등

< 참고자료 / 유의사항 >
예시) 참고사이트, 기타 유의사항 등 ",
                'deadline' =>\Carbon\Carbon::now()->toDateString(),

            ]);
            DB::table('projects')->insert([
                'area' => "운영 대행",
                'category' => "기타",
                'title' => "GMLAB" . $i,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'step' => '검수',
                'Client_id' => $i,
                'intro' => "네이버 광고를 이용해 매출 20% 신장을 목표로 하고 있습니다. 페이스북도 좋습니다.",
                'budget' => 10000000,
                'estimated_duration' => "2016-12-25",

                'managing_experience' => "있음",
                'expected_start_date' => "2016-12-25",
                'meeting_way' => "온라인 미팅",
                'address_sido' => "서울특별시",


                'detail_content' =>
                    "< 프로젝트 진행 방식 >
예시) 시작시점에 미팅, 주 1회 미팅 등

< 프로젝트의 현재 상황 >
예시) 기획 여부, 컨텐츠 준비 여부, 타겟 고객, 진행 계획 등

< 상세한 업무 내용 >
예시) 사이트의 용도, 페이지 수, 레이아웃(비슷한 페이지) 수 등

< 참고자료 / 유의사항 >
예시) 참고사이트, 기타 유의사항 등 ",
                'deadline' =>\Carbon\Carbon::now()->toDateString(),

            ]);
        }
    }
}
