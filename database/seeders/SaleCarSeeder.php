<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleCarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sale_Cars')->insert(
            [
            [
                'carname'=> 'hondarabon',
                'brand' => 'Honda',
                'model' => 'Civic 2021',
                'color' => 'Red',
                'price' => '2550000',
                'description' => 'hello to the Honda Brand City',
                'image' => 'admin/images/21630125448.jpeg'
            ],
            [
                'carname'=> 'Toyota Yaris',
                'brand' => 'Toyota',
                'model' => '20220',
                'color' => 'red',
                'price' => '2550000',
                'description' => 'hello to the Honda Brand City',
                'image' => 'admin/images/491630319574.jpg'
            ],
            [
                'carname'=> 'Toyota Lamo',
                'brand' => 'Toyota',
                'model' => 'Yaris 2021',
                'color' => 'Blue',
                'price' => '2550000',
                'description' => 'hello to the Honda Brand City',
                'image' => 'admin/images/201630387812.jpg'
            ],
            [
                'carname'=> 'Forutner Grandy',
                'brand' => 'Fortuner',
                'model' => 'Lamo 2021',
                'color' => 'Red',
                'price' => '2550000',
                'description' => 'hello to the Honda Brand City',
                'image' => 'admin/images/411630387858.jpeg'
            ],
            ]

        );
    }
}
