<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Calling the Defaulter Seeder
        $this->call([
            DefaulterSeeder::class,
        ]);
    }
}
