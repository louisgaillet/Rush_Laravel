<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.fr',
            'role' => 'admin',
            'password' => bcrypt('adminadmin'),
        ]);

        DB::table('users')->insert([
            'name' => 'Dupont',
            'email' => 'dupont@chezlui.fr',
            'password' => bcrypt('user'),
        ]);
    }
}
