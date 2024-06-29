<?php

namespace Database\Seeders;

use App\Models\Test;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Test::create(['test_name' => 'Blood Test', 'description' => 'Standard blood test']);
        Test::create(['test_name' => 'Urine Test', 'description' => 'Standard urine test']);
    }
}