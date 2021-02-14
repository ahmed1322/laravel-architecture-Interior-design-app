<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->count(7)->create();
    }
}
