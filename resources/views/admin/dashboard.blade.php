@extends('layouts.admin')

@section('title', 'Tableau de Bord')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Stats Cards -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 transition-all hover:shadow-md">
        <div class="flex items-center gap-4">
            <div class="h-12 w-12 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Produits</p>
                <h3 class="text-2xl font-bold text-gray-900">{{ $stats['total_products'] }}</h3>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 transition-all hover:shadow-md">
        <div class="flex items-center gap-4">
            <div class="h-12 w-12 rounded-lg bg-green-100 flex items-center justify-center text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Stock Total</p>
                <h3 class="text-2xl font-bold text-gray-900">{{ number_format($stats['total_stock']) }}</h3>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 transition-all hover:shadow-md">
        <div class="flex items-center gap-4">
            <div class="h-12 w-12 rounded-lg bg-purple-100 flex items-center justify-center text-purple-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 15.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Clients</p>
                <h3 class="text-2xl font-bold text-gray-900">{{ $stats['total_clients'] }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-8">
    <!-- Recent Products -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="p-6 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-800">Derniers Produits</h3>
            <a href="{{ route('products.index') }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">Voir tout</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Nom</th>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Prix</th>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($recent_products as $product)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-sm text-gray-900 font-medium">{{ $product->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ number_format($product->price, 2) }} €</td>
                        <td class="px-6 py-4 text-sm text-right">
                            <a href="{{ route('products.show', $product) }}" class="text-indigo-600 hover:underline">Détails</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">Aucun produit trouvé.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Low Stock Alerts -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="p-6 border-b border-gray-200 flex justify-between items-center bg-red-50">
            <h3 class="text-lg font-semibold text-red-800 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                Alertes Stock Faible
            </h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Produit</th>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Quantité</th>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($low_stock_products as $product)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-sm text-gray-900 font-medium">{{ $product->name }}</td>
                        <td class="px-6 py-4 text-sm text-red-600 font-bold">{{ $product->stocks_sum_quantity ?? 0 }}</td>
                        <td class="px-6 py-4 text-sm text-right">
                            <a href="{{ route('stocks.index', ['product_id' => $product->id]) }}" class="text-indigo-600 hover:underline">Réapprovisionner</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">Aucune alerte de stock.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-8 bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="p-6 border-b border-gray-200 flex justify-between items-center">
        <h3 class="text-lg font-semibold text-gray-800">Derniers Clients</h3>
        <a href="{{ route('clients.index') }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">Voir tout</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Client</th>
                    <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Téléphone</th>
                    <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase text-right">Date d'inscription</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($recent_clients as $client)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-sm text-gray-900 font-medium">{{ $client->first_name }} {{ $client->last_name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $client->email }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $client->phone }}</td>
                    <td class="px-6 py-4 text-sm text-right text-gray-500">{{ $client->created_at->format('d/m/Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">Aucun client trouvé.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
