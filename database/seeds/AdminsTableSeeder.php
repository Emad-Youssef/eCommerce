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
            'name' => 'super',
            'email' => 'admin@app.com',
            'password' => bcrypt('123456'),
        ]);

    }
}
