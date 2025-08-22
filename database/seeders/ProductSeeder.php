<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['name' => 'Laptop', 'price' => 799, 'description' => 'High-performance laptop with SSD and 16GB RAM.'],
            ['name' => 'Smartphone', 'price' => 499, 'description' => 'Latest 5G smartphone with excellent camera.'],
            ['name' => 'Headphones', 'price' => 99, 'description' => 'Noise-cancelling over-ear headphones.'],
            ['name' => 'Smartwatch', 'price' => 199, 'description' => 'Track fitness, heart rate, and notifications.'],
            ['name' => 'Tablet', 'price' => 299, 'description' => '10-inch tablet for work and play.'],
            ['name' => 'Bluetooth Speaker', 'price' => 79, 'description' => 'Portable waterproof Bluetooth speaker.'],
            ['name' => 'Gaming Console', 'price' => 399, 'description' => 'Next-gen gaming console with 4K support.'],
            ['name' => 'Keyboard', 'price' => 49, 'description' => 'Mechanical keyboard with RGB lights.'],
            ['name' => 'Mouse', 'price' => 29, 'description' => 'Wireless ergonomic mouse.'],
            ['name' => 'Monitor', 'price' => 249, 'description' => '27-inch 4K UHD monitor.'],
            ['name' => 'External Hard Drive', 'price' => 89, 'description' => '2TB portable external hard drive.'],
            ['name' => 'Camera', 'price' => 599, 'description' => 'DSLR camera with 24MP lens.'],
            ['name' => 'Drone', 'price' => 899, 'description' => '4K camera drone with GPS.'],
            ['name' => 'Printer', 'price' => 159, 'description' => 'Wireless all-in-one printer.'],
            ['name' => 'VR Headset', 'price' => 349, 'description' => 'Virtual reality headset with motion controllers.'],
            ['name' => 'Power Bank', 'price' => 39, 'description' => '10000mAh fast-charging power bank.'],
            ['name' => 'Smart TV', 'price' => 699, 'description' => '55-inch 4K Ultra HD Smart TV.'],
            ['name' => 'Router', 'price' => 129, 'description' => 'Wi-Fi 6 dual-band router.'],
            ['name' => 'Earbuds', 'price' => 59, 'description' => 'True wireless earbuds with noise isolation.'],
            ['name' => 'Smart Home Hub', 'price' => 149, 'description' => 'Control all your smart devices in one place.'],
        ]);
    }
}
