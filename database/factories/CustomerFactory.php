<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
use Faker\Generator as Faker;
 

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CustomerFactory extends Factory
{

    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->name,
            'phone_customer'=> $this->faker->phoneNumber,
            'email_customer'=> $this->faker->unique()->email,
            'city_customer'=> $this->faker->city
        ];
    }
}
