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
        App\User::create([
        	'name' => 'admin',
        	'email' => 'admin@admin.com',
            'role_id' => App\User::ADMIN,
        	'password' => bcrypt('password'),
        ]);
    }
}
