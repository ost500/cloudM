<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PartnerSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(NotificationSeeder::class);
    }
}
