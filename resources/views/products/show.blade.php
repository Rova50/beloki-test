<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Détails du Produit') }}: {{ $product->name }}
            </h2>
            <div class="space-x-2">
                <a href="{{ route('products.edit', $product) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Modifier
                </a>
                <a href="{{ route('products.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition ease-in-out duration-150">
                    Retour
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100 p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 border-b pb-2 mb-4">Informations Générales</h3>
                        <dl class="space-y-3">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Nom</dt>
                                <dd class="text-base text-gray-900">{{ $product->name }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">SKU (Référence)</dt>
                                <dd class="text-base font-mono text-gray-900">{{ $product->sku }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Prix</dt>
                                <dd class="text-base text-gray-900 font-bold text-indigo-600">{{ number_format($product->price, 2) }} €</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Description</dt>
                                <dd class="text-base text-gray-600">{{ $product->description ?: 'Aucune description fournie.' }}</dd>
                            </div>
                        </dl>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 border-b pb-2 mb-4">État des Stocks</h3>
                        <div class="bg-gray-50 rounded-lg p-6 border border-gray-100">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-sm font-medium text-gray-500 uppercase tracking-wider">Quantité Totale</span>
                                <span class="px-3 py-1 rounded-full text-sm font-bold {{ $product->stocks->sum('quantity') < 10 ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                                    {{ $product->stocks->sum('quantity') }} en stock
                                </span>
                            </div>
                            <div class="space-y-3">
                                <h4 class="text-xs font-semibold text-gray-400 uppercase tracking-widest">Détails par emplacement</h4>
                                <ul class="divide-y divide-gray-200">
                                    @forelse($product->stocks as $stock)
                                    <li class="py-2 flex justify-between">
                                        <span class="text-sm text-gray-600">{{ $stock->location ?: 'Non spécifié' }}</span>
                                        <span class="text-sm font-medium text-gray-900">{{ $stock->quantity }}</span>
                                    </li>
                                    @empty
                                    <li class="py-2 text-sm text-gray-500 italic text-center">Aucun stock enregistré pour ce produit.</li>
                                    @endforelse
                                </ul>
                                <div class="pt-4">
                                    <a href="{{ route('stocks.create', ['product_id' => $product->id]) }}" class="text-xs font-bold text-indigo-600 hover:text-indigo-800 uppercase tracking-wider">+ Ajouter du stock</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
