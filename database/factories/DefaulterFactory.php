<?php

namespace Database\Factories;

use App\Models\Defaulter;
use Illuminate\Database\Eloquent\Factories\Factory;

class DefaulterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Defaulter::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Explicit weighted arrays matching your target dashboard percentages
        $tariffs = array_merge(
            array_fill(0, 47, 'DOM'),   // ~47%
            array_fill(0, 21, 'IND'),   // ~21%
            array_fill(0, 14, 'AGRI'),  // ~14%
            array_fill(0, 13, 'OTHER'), // ~13%
            array_fill(0, 5, 'COM')     // ~5%
        );

        $statuses = array_merge(
            array_fill(0, 59, 'Disconnected'), // ~59%
            array_fill(0, 41, 'Active')        // ~41%
        );

        $types = array_merge(
            array_fill(0, 87, 'Private'), // ~87%
            array_fill(0, 13, 'Govt')     // ~13%
        );

        $circles = [
            'S.E. 1st', 'S.E. 2nd', 'S.E. 3rd', 'S.E. 4th', 'S.E. 5th',
            'Sheikhupura', 'Kasur', 'Nankana', 'Industrial'
        ];

        // Generate the outstanding amount first so we can bound the recovery amount safely
        $outstandingAmount = $this->faker->randomFloat(2, 5000, 500000);

        // 30% chance of recovery happening, otherwise explicitly defaults to 0.00
        $revenueRecovered = $this->faker->optional(0.3, 0.00)->randomFloat(
            2,
            1000,
            min($outstandingAmount, 50000) // Caps recovery so it never exceeds the actual bill debt
        );

        return [
            // Realistic 14-digit LESCO format reference numbers
            'reference_no'       => $this->faker->unique()->numerify('## #### ####### #'),
            'circle'             => $this->faker->randomElement($circles),
            'tariff_type'        => $this->faker->randomElement($tariffs),
            'status'             => $this->faker->randomElement($statuses),
            'consumer_type'      => $this->faker->randomElement($types),
            'outstanding_amount' => $outstandingAmount,
            'revenue_recovered'  => $revenueRecovered,
        ];
    }
}
