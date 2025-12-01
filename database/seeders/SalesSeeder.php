<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sales')->insert([
            ['product_name' => 'Produk A', 'sale_date' => '2025-01-01', 'quantity' => 2, 'price' => 50000],
            ['product_name' => 'Produk B', 'sale_date' => '2025-01-02', 'quantity' => 1, 'price' => 75000],
            ['product_name' => 'Produk C', 'sale_date' => '2025-01-03', 'quantity' => 2, 'price' => 60000],
            ['product_name' => 'Produk D', 'sale_date' => '2025-01-02', 'quantity' => 2, 'price' => 61000],
            ['product_name' => 'Produk E', 'sale_date' => '2025-01-04', 'quantity' => 1, 'price' => 25000],
        ]);
    }
}
