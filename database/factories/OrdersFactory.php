<?php

namespace Database\Factories;

use App\Models\Orders;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Orders::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {


        return [
            'order_number' => $this->faker->numerify('XD_#####'),
            'parent_mobile' => $this->faker->tollFreePhoneNumber,
            'student' => $this->faker->name,
            'parrent' => $this->faker->name,
            'price' => $this->faker->randomNumber(2),
            'discount' => $this->faker->randomNumber(1),
            'status' => $this->faker->randomElement($array = array ('Active','Cancelled','Pending')),
        ];
    }
}
