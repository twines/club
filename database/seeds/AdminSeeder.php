<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $adminList = [
            [
                'name' => 'hanyun',
                'password' => encrypt('123456')
            ],
            [
                'name' => 'rumeng',
                'password' => encrypt('123456')
            ],
        ];
        foreach ($adminList as $admin) {
            \App\Admin::firstOrCreate($admin);
        }
    }
}
