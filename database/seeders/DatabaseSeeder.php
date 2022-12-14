<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\Role;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $roles = ['admin', 'user'];
        foreach($roles as $role){
            Role::create([
                'name' => $role
            ]);
        }

        $categories = ['work','personal','nature'];
        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
        // Post::factory(6)->create();
    }
}
