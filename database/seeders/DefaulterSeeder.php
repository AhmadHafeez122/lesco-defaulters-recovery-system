<?php

namespace Database\Seeders;

use App\Models\Defaulter;
use Illuminate\Database\Seeder;

class DefaulterSeeder extends Seeder
{
    public function run(): void
    {
        // Generating 10,000 dummy records for the dashboard
        // Note: Change 10000 to a smaller number like 50 if your computer slows down during seeding
        Defaulter::factory()->count(10000)->create();

        $this->command->info('10,000 Defaulter records generated successfully!');
    }
}
