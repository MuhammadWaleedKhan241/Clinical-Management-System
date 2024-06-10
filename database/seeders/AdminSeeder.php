<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([

            'name' => 'Admin',
            
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('123456789'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
    }
}