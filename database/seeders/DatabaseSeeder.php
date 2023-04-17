<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        Movie::create([
            'title' => 'Godfather',
            'description' => 'One of the best movies ever',
            'slug' => 'movie-godfather'
        ]);

        Movie::create([
            'title' => 'Scarface',
            'description' => 'One of my favourites',
            'slug' => 'scar'
        ]);

        Movie::create([
            'title' => 'Pulp fiction',
            'description' => 'The best from Tarantino',
            'slug' => 'pulp_fiction'
        ]);

        Movie::create([
            'title' => 'Small description',
            'description' => 'Small',
            'slug' => 'small'
        ]);

        Movie::create([
            'title' => 'Numbers movie',
            'description' => '12345',
            'slug' => '12345'
        ]);
    }
}
