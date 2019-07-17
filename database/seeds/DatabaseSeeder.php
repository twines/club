<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UpSeeder::class);
        $this->call(TopicSeeder::class);
        $this->call(TopicVideoSeeder::class);
    }
}
