<?php

use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->insert([
            'partner_id' => "1",
            'title' => "바이럴 마케팅",
            'number' => "10",
            'experience' => "19년 이상"
        ]);
    }
}
