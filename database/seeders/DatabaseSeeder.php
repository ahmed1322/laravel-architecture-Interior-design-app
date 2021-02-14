<?php

namespace Database\Seeders;
// use App\Models\Category;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SettingSeeder::class,
            RoleSeeder::class,
            AdminSeeder::class,
            UserSeeder::class,
            SubAdminSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            PostSeeder::class,
            PostCommentsSeeder::class,
            PortfolioSeeder::class,
            SliderSeeder::class,
            ServiceSeeder::class,
            TestimonialSeeder::class,
            TeamSeeder::class,
            MessageSeeder::class,
            SubscribeSeeder::class,
        ]);
    }
}
