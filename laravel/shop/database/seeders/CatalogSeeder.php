<?php

namespace Database\Seeders;

use App\Models\Products;
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
    }
}
