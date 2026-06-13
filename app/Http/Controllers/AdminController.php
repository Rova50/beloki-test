<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Client;
use App\Models\Stock;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'total_products' => Product::count(),
            'total_clients' => Client::count(),
            'total_stock' => Stock::sum('quantity'),
        ];

        $recent_products = Product::latest()->take(5)->get();
        $recent_clients = Client::latest()->take(5)->get();

        // Products with low stock (total quantity across all locations < 10)
        $low_stock_products = Product::withSum('stocks', 'quantity')
            ->having('stocks_sum_quantity', '<', 10)
            ->take(5)
            ->get();

        return view('dashboard', compact('stats', 'recent_products', 'recent_clients', 'low_stock_products'));
    }
}
