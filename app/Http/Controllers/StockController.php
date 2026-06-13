<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::with('product')->latest()->paginate(10);
        return view('stocks.index', compact('stocks'));
    }

    public function create(Request $request)
    {
        $products = Product::all();
        $selected_product_id = $request->query('product_id');
        return view('stocks.create', compact('products', 'selected_product_id'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:0',
            'location' => 'nullable|string|max:255',
        ]);

        Stock::create($validated);

        return redirect()->route('stocks.index')->with('success', 'Mouvement de stock enregistré.');
    }

    public function show(Stock $stock)
    {
        return view('stocks.show', compact('stock'));
    }

    public function edit(Stock $stock)
    {
        $products = Product::all();
        return view('stocks.edit', compact('stock', 'products'));
    }

    public function update(Request $request, Stock $stock)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:0',
            'location' => 'nullable|string|max:255',
        ]);

        $stock->update($validated);

        return redirect()->route('stocks.index')->with('success', 'Mouvement de stock mis à jour.');
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stocks.index')->with('success', 'Mouvement de stock supprimé.');
    }
}
