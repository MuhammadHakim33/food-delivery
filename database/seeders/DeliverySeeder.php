<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Delivery;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Delivery::insert([
            [
                'id' => '01JGX0SK6PY5VQ69SCJYBE33QQ',
                'order_id' => 'ORD-20250101-XYZ',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '01JGX0SX2N35XZBAKNJZXZ0B4F',
                'order_id' => 'ORD-20250102-XYZ',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '01JGX0T6TY3V7VSVSG9APRGCPR',
                'order_id' => 'ORD-20250103-XYZ',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
