<?php

namespace Database\Factories;

use App\Models\SubAdmin;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class SubAdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubAdmin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'role_id' => $this->sub_admin_role_id,
            'role_id' => DB::table('roles')->select('id')->where('name' , 'sub_admin')->value('id'),
            'status' => 1,
            'name' => $name = $this->faker->unique()->randomElement(['subadmin-1', 'subadmin-2', 'subadmin-3', 'subadmin-4', 'subadmin-5']),
            'email' =>  $name . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
}
