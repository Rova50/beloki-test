<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::all()->each(function ($product) {
            \App\Models\Stock::factory()->create([
                'product_id' => $product->id,
            ]);
        });
    }
}
