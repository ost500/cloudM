<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'project_id' => "1",
            'comment' => "지금 당장 연락주세요"
        ]);
    }
}
