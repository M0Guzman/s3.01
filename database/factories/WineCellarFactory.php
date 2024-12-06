<?php
namespace Database\Factories;
use App\Models\SamplingType;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class WineCellarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sampling_type_id' => SamplingType::all()->random()->id,
        ];
    }
}