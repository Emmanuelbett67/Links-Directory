<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

$factory = Factory::factoryForModel(\App\Link::class);

use App\Models\Link;
use Faker\Generator as Faker;


class LinkFactory extends Factory
{
    protected $model = Link::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(2),
            'url' => $this->faker->url,
            'description' => $this->faker->paragraph,
        ];
    }
}


 

