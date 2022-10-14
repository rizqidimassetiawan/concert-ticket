<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Visitors;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Visitors::factory(30)->create();
        User::factory(1)->create();
        
        $this->call(IndoRegionSeeder::class);
        $this->call(BandSeeder::class);
    }
}