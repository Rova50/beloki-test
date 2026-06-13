<div class="space-y-4">
    <div>
        <x-input-label for="product_id" :value="__('Produit')" />
        <select id="product_id" name="product_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
            <option value="">Sélectionner un produit</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}" {{ (old('product_id', $stock->product_id ?? ($selected_product_id ?? '')) == $product->id) ? 'selected' : '' }}>
                    {{ $product->name }} (SKU: {{ $product->sku }})
                </option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('product_id')" />
    </div>

    <div>
        <x-input-label for="quantity" :value="__('Quantité')" />
        <x-text-input id="quantity" name="quantity" type="number" class="mt-1 block w-full" :value="old('quantity', $stock->quantity ?? '')" required />
        <x-input-error class="mt-2" :messages="$errors->get('quantity')" />
    </div>

    <div>
        <x-input-label for="location" :value="__('Emplacement (Ex: Entrepôt A, Étagère 4)')" />
        <x-text-input id="location" name="location" type="text" class="mt-1 block w-full" :value="old('location', $stock->location ?? '')" />
        <x-input-error class="mt-2" :messages="$errors->get('location')" />
    </div>
</div>
