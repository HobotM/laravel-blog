<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $user = User::factory()->create([
            'name' => "Mateusz Hobot",
            'password' => "mattmatt",
            'email' => "mateuszhobot@gmail.com",
            'username' => 'mattmatt',
            'verified' => 1,
            'isAdmin' => 1,
            'isSuperAdmin' => 1
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id
        ]);
    }
}
