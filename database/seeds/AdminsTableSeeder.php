<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\admin::create([
            'name' => 'emad youssef',
            'email' => 'emad@youssef.com',
            'password' => bcrypt('123456'),
        ]);

    }
}
