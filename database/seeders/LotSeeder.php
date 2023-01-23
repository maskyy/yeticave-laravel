<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lots = [
            [
                'title' => '2014 Rossignol District Snowboard',
                'description' => '',
                'url' => 'img/lot-1.jpg',
                'price' => 10999,
                'bet_step' => 100,
                'author_id' => 1,
                'category_id' => 1,
                'end_date' => '2023-09-28'

            ],
            [
                'title' => 'DC Ply Mens 2016/2017 Snowboard',
                'description' => '',
                'url' => 'img/lot-2.jpg',
                'price' => 159999,
                'bet_step' => 100,
                'author_id' => 1,
                'category_id' => 1,
                'end_date' => '2023-09-28'

            ],
            [
                'title' => 'Крепления Union Contact Pro 2015 года размер L/XL',
                'description' => '',
                'url' => 'img/lot-3.jpg',
                'price' => 8000,
                'bet_step' => 100,
                'author_id' => 1,
                'category_id' => 2,
                'end_date' => '2023-09-28'

            ],
            [
                'title' => 'Ботинки для сноуборда DC Mutiny Charocal',
                'description' => '',
                'url' => 'img/lot-4.jpg',
                'price' => 10999,
                'bet_step' => 100,
                'author_id' => 2,
                'category_id' => 3,
                'end_date' => '2023-09-28'

            ],
            [
                'title' => 'Куртка для сноуборда DC Mutiny Charocal',
                'description' => '',
                'url' => 'img/lot-5.jpg',
                'price' => 7500,
                'bet_step' => 100,
                'author_id' => 2,
                'category_id' => 4,
                'end_date' => '2023-09-28'

            ],
            [
                'title' => 'Маска Oakley Canopy',
                'description' => '',
                'url' => 'img/lot-6.jpg',
                'price' => 5400,
                'bet_step' => 100,
                'author_id' => 2,
                'category_id' => 6,
                'end_date' => '2023-09-28'

            ]
        ];
        DB::table('lots')->insert($lots);
    }
}
