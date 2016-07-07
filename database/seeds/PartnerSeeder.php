<?php

use App\Client;
use App\Partners;
use App\Partners_job;
use App\User;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 7; $i <= 150; $i += 4) {
            $userCreation = User::create([
                'name' => '박한울' . $i,
                'nick' => 'foo' . $i,
                'email' => 'foo' . $i . '@bar.com',
                'password' => bcrypt('qwqw1212'),
                'PorC' => 'P',
                'profileImage' => "/files/userImage/3"
            ]);

            $partnerCreation = Partners::create([
                'user_id' => $userCreation['id'],
                'intro' => "믿음이 가는 마케팅 업체! 믿고 맡겨 주세요" . $i
            ]);
            Partners_job::create([
                'partner_id' => $partnerCreation['id'],
                'job' => '네이버CPC'
            ]);
            Partners_job::create([
                'partner_id' => $partnerCreation['id'],
                'job' => '네이버SEO'
            ]);
            Partners_job::create([
                'partner_id' => $partnerCreation['id'],
                'job' => '블로그'
            ]);
/////////////////////////////////////////////////////

            $userCreation = User::create([
                'name' => '심현보' . $i,
                'nick' => 'foo' . $i,
                'email' => 'foo' . ($i + 1) . '@bar.com',
                'password' => bcrypt('qwqw1212'),
                'PorC' => 'P',
                'profileImage' => '/files/userImage/1'
            ]);
            $partnerCreation = Partners::create([
                'user_id' => $userCreation['id'],
                'intro' => "믿음이 가는 마케팅 업체! 믿고 맡겨 주세요" . $i
            ]);
            Partners_job::create([
                'partner_id' => $partnerCreation['id'],
                'job' => '개발'
            ]);
            Partners_job::create([
                'partner_id' => $partnerCreation['id'],
                'job' => '디자인',
            ]);


            $userCreation = User::create([
                'name' => '오상택' . $i,
                'nick' => 'foo' . $i,
                'email' => 'foo' . ($i + 2) . '@bar.com',
                'password' => bcrypt('qwqw1212'),
                'PorC' => 'C'
            ]);
            Client::create([
                'user_id' => $userCreation['id']
            ]);


        }
        User::create([
            'name' => '관리자',
            'nick' => '관리자',
            'email' => 'admin@bar.com',
            'password' => bcrypt('qwqw1212'),
            'PorC' => 'A'
        ]);
    }
}
