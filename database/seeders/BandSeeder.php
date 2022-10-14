<?php

namespace Database\Seeders;

use App\Models\Band;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bands = [
            [
                'name' => 'Kangen Band',
                'genre' => 'Pop Punk',
            ],
            [
                'name' => 'Ada Band',
                'genre' => 'Pop',
            ],
            [
                'name' => 'Metalica',
                'genre' => 'Metal',
            ],
            [
                'name' => 'Roma Irama',
                'genre' => 'Dangdut',
            ],
            [
                'name' => 'Via Vallen',
                'genre' => 'Koplo',
            ]
        ];

        foreach ($bands as $band) {
            Band::create($band);
        }
    }
     
}