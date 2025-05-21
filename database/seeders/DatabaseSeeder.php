<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Entity;
use App\Models\Link;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $user = User::factory()->create();

        $entity = Entity::factory()->create([
            'user_id' => $user->id,
        ]);

        $categories = Category::factory(8)->create([
            'entity_id' => $entity->id,
        ]);

        foreach ($categories as $category) {
            Article::factory(10)->create([
                'category_id' => $category->id,
            ]);
        }

        Link::factory(8)->create([
            'entity_id' => $entity->id,
        ]);

    }
}
