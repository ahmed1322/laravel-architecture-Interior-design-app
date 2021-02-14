<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'site_name' => 'Theratio',
            'site_logo_dark' => 'app/M331thAdlQuZbLwbJHkb1GEALGSU1Swq3bj2iBTd.svg',
            'site_logo_light' => 'app/uvK8Y4jaM4JzP8lBsT4QAXF0hoA8Xzo8ks6wFmY5.svg',
            'site_email' => 'ahmedmostafaui@gmail.com',
            'site_location' => '411 University St, Seattle, USA',
            'site_phone' => '+201018034310',
        ];
    }
}
