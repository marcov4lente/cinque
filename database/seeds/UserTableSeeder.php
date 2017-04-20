<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $prefix = config('database.connections.mysql.prefix');

        DB::table($prefix.'users')->insert([
            'first_name' => 'Administrator',
            'email' => bcrypt('admin@example.com'),
            'password' => bcrypt('123'),
            'access_role_id' => 1,
        ]);

    }
}
