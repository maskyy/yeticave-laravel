<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['title' => 'Доски и лыжи', 'alias' => 'boards'],
            ['title' => 'Крепления', 'alias' => 'attachment'],
            ['title' => 'Ботинки', 'alias' => 'boots'],
            ['title' => 'Одежда', 'alias' => 'clothing'],
            ['title' => 'Инструменты', 'alias' => 'tools'],
            ['title' => 'Разное', 'alias' => 'other']
        ];

        DB::table('categories')->insert($categories);
    }
}
