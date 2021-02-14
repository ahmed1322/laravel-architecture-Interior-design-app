<?php

namespace Database\Seeders;
use App\Models\SubAdmin;
use Illuminate\Database\Seeder;

class SubAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubAdmin::factory()->count(5)->create();
    }
}
