<?php

namespace Database\Factories;

use Faker\Factory as faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use App\Models\StudentModel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentModel>
 */
class StudentModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = StudentModel::class;
    
    public function definition()
    {
        $faker = faker::create();
        return [
            'name'      => $faker->name(),
            'gender'    => Arr::random(['L', 'P']),
            'nis'       => mt_rand(0000001,9999999),
            'class_id'  => Arr::random([1,2,3,4]),
        ];
    }
}
