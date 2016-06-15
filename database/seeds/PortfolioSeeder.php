<?php

use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('portfolios')->insert([
            'partner_id' => "1",
            'title' => "포트폴리오",
            'area' => "Viral",
            'category' => "의료",
            'description' => "짱열심히 함",
            'image1' => "",
            'caption1' => "",
        ]);
    }
}
