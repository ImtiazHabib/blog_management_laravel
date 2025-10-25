<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
           "name" => "Post 1",
           "description" =>"post 1 description",
           "date" => now()->format('Y-m-d'),
           "user_id" => 1,
        ]);
    }
}
