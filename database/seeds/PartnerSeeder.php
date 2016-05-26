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
                'email' => 'foo' . $i . '@bar.com',
                'password' => bcrypt('qwqw1212'),
                'PorC' => 'P'
            ]);

            $partnerCreation = Partners::create([
                'user_id' => $userCreation['id']
            ]);
            Partners_job::create([
                'partner_id' => $partnerCreation['id'],
                'job' => 'Viral'
            ]);


            $userCreation = User::create([
                'name' => '심현보' . $i,
                'email' => 'foo' . ($i + 1) . '@bar.com',
                'password' => bcrypt('qwqw1212'),
                'PorC' => 'P'
            ]);
            $partnerCreation = Partners::create([
                'user_id' => $userCreation['id']
            ]);
            Partners_job::create([
                'partner_id' => $partnerCreation['id'],
                'job' => '1회성프로젝트'
            ]);


            $userCreation = User::create([
                'name' => '오상택' . $i,
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
            'email' => 'admin@bar.com',
            'password' => bcrypt('qwqw1212'),
            'PorC' => 'A'
        ]);
    }
}
