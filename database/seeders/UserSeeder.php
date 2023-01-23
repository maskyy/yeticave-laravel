<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Alex',
                'email' => 'a@a.ru',
                'password' => bcrypt('password@'),
                'contacts' => '89997773355'

            ],
            [
                'name' => 'Elena',
                'email' => 'e@e.ru',
                'password' => bcrypt('password@'),
                'contacts' => '89995558844'

            ],
        ];
        DB::table('users')->insert($users);
    }
}
