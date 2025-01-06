<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::insert([
            [
                'id' => 'ORD-20250101-XYZ',
                'user_id' => 1,
                'total' => 20000,
                'status' => 'failed',
                'snap_token' => '2323232',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'ORD-20250102-XYZ',
                'user_id' => 1,
                'total' => 20000,
                'status' => 'pending',
                'snap_token' => '2323232',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'ORD-20250103-XYZ',
                'user_id' => 1,
                'total' => 20000,
                'status' => 'success',
                'snap_token' => '2323232',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
