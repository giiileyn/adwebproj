<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Seller;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Seller::create([
            'name' => 'Seller1',
            'username' => 'seller1',
            'email' => 'seller1@gmail.com',
            'password' => Hash::make('seller112345'),
            'picture' => 'default.jpg',
            'address' => '123 Main St',
            'phone' => '09123456789',
            'status' => 'Active',
        ]);

        Seller::create([
            'name' => 'Seller2',
            'username' => 'seller2',
            'email' => 'seller2@gmail.com',
            'password' => Hash::make('seller212345'),
            'picture' => 'profile.jpg',
            'address' => '456 Oak Ave',
            'phone' => '09876543219',
            'status' => 'Pending',
        ]);
    }
}
