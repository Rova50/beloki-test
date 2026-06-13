<div class="space-y-4">
    <div>
        <x-input-label for="sku" :value="__('SKU (Référence)')" />
        <x-text-input id="sku" name="sku" type="text" class="mt-1 block w-full" :value="old('sku', $product->sku ?? '')" required autofocus />
        <x-input-error class="mt-2" :messages="$errors->get('sku')" />
    </div>

    <div>
        <x-input-label for="name" :value="__('Nom du Produit')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $product->name ?? '')" required />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div>
        <x-input-label for="price" :value="__('Prix (€)')" />
        <x-text-input id="price" name="price" type="number" step="0.01" class="mt-1 block w-full" :value="old('price', $product->price ?? '')" required />
        <x-input-error class="mt-2" :messages="$errors->get('price')" />
    </div>

    <div>
        <x-input-label for="description" :value="__('Description')" />
        <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description', $product->description ?? '') }}</textarea>
        <x-input-error class="mt-2" :messages="$errors->get('description')" />
    </div>
</div>
