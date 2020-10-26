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
        DB::table('admins')->truncate();
        DB::table('admins')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@lalune.test',
                'password' => bcrypt('123456'),
                'phone' => '+911234565434',
                'avatar' => 'admin.jpg'
            ]
        ]);
    }
}
