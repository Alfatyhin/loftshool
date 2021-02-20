<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Products;
use App\Models\User;
use App\Models\News;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Products::factory(100)->create();
        $category = array('Action', 'RPG', 'Квесты', 'Онлайн-игры', 'Стратегии');
        foreach ($category as $k => $name) {
            $insert = new Category();
            $insert->name = $name;
            $insert->description = 'Iure dolorum repellendus asperiores doloremque fuga.
            Est architecto possimus quasi et voluptatem esse. Dolore dolor est dolorum nisi. Architecto ipsum cum fuga quasi id in.';
            $insert->save();
        }
        News::factory(10)->create();
        User::factory(20)->create();
    }
}
