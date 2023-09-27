<?php

namespace Database\Seeders;

use App\Models\Merchant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [];

        $numMerchants = Merchant::count();
        $merchantIds = range(1, $numMerchants); // Generate an array of merchant IDs from 1 to $numMerchants

        foreach ($merchantIds as $merchantId) {
            for ($i = 0; $i < 100; $i++) {
                $users[] = [
                    'name' => fake()->unique()->name(),
                    'merchant_id' => $merchantId,
                    'email' => fake()->unique()->email(),
                    'password' => Hash::make('password'), // Change this to your password hashing logic.
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }
        DB::table('users')->insert($users);
    }
}
