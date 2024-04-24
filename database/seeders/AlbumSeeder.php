<?php

namespace Database\Seeders;

use Database\Factories\AlbumFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AlbumFactory::factory()->create([
            'album_name' => 'Test User',
            'album_cover' => 'test@example.com',
        ]);
    }
}
