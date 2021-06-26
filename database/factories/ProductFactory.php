<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $price = rand(100,10000);
        return [
           'name'=> $this->faker->catchPhrase,
           'description'=>$this->faker->boolean()?$this->faker->realTextBetween(200,400):null,
           'price' => $price,
           'discount' => $this->faker->boolean()?(int)$price/rand(10,100):0,
           'product_category_id' => rand(1,ProductCategory::count()),
           'user_id' => User::query()->vendor()->get()->random()->id,
           'image'=> '/images/tests/products/product'.rand(1,28).'.jpg',
        ];
    }
}
