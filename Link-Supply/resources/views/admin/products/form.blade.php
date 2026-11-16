<div class="mb-5 flex justify-end">
    <button class="rounded-lg bg-emerald-700 px-4 py-2 font-semibold text-white" type="submit" form="product-form">{{ $submitLabel }}</button>
</div>

<form id="product-form" action="{{ $action }}" method="POST" class="space-y-4">
    @csrf
    @if ($method !== 'POST')
        @method($method)
    @endif

    @if ($errors->any())
        <div class="rounded-lg bg-red-50 p-4 text-sm text-red-800" role="alert">
            <ul class="list-inside list-disc">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <label class="block text-sm font-medium">Nama produk
        <input class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2" name="name" value="{{ old('name', $product?->name) }}" required maxlength="255">
    </label>

    <label class="block text-sm font-medium">Kategori
        <select class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2" name="category_id" required>
            <option value="">Pilih kategori</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected((string) old('category_id', $product?->category_id) === (string) $category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
    </label>

    <div class="grid gap-4 sm:grid-cols-2">
        <label class="block text-sm font-medium">Harga
            <input class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2" type="number" name="price" value="{{ old('price', $product?->price) }}" min="0" required>
        </label>
        <label class="block text-sm font-medium">Satuan harga
            <input class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2" name="price_unit" value="{{ old('price_unit', $product?->price_unit ?? 'kg') }}" required maxlength="50">
        </label>
        <label class="block text-sm font-medium">Pesanan minimum
            <input class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2" type="number" name="min_order" value="{{ old('min_order', $product?->min_order ?? 1) }}" min="1" required>
        </label>
        <label class="block text-sm font-medium">Satuan pesanan minimum
            <input class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2" name="min_order_unit" value="{{ old('min_order_unit', $product?->min_order_unit ?? 'kg') }}" required maxlength="50">
        </label>
        <label class="block text-sm font-medium">Stok
            <input class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2" type="number" name="stock" value="{{ old('stock', $product?->stock ?? 0) }}" min="0" required>
        </label>
        <label class="block text-sm font-medium">Satuan stok
            <input class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2" name="stock_unit" value="{{ old('stock_unit', $product?->stock_unit ?? 'kg') }}" required maxlength="50">
        </label>
        <label class="block text-sm font-medium">Lokasi
            <input class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2" name="location" value="{{ old('location', $product?->location) }}" required maxlength="255">
        </label>
        <label class="block text-sm font-medium">Provinsi
            <input class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2" name="province" value="{{ old('province', $product?->province) }}" required maxlength="150">
        </label>
        <label class="block text-sm font-medium">Rating
            <input class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2" type="number" name="rating" value="{{ old('rating', $product?->rating ?? 5) }}" min="0" max="5" step="0.1" required>
        </label>
        <label class="block text-sm font-medium">Jumlah terjual
            <input class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2" name="sold_count" value="{{ old('sold_count', $product?->sold_count ?? '0') }}" maxlength="50" required>
        </label>
    </div>

    <label class="block text-sm font-medium">Path atau URL gambar
        <input class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2" name="image" value="{{ old('image', $product?->image) }}" required maxlength="2048">
    </label>

    <label class="block text-sm font-medium">Deskripsi
        <textarea class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2" name="description" rows="5" required>{{ old('description', $product?->description) }}</textarea>
    </label>

    <div class="flex items-center gap-3 pt-2">
        <button class="rounded-lg bg-emerald-700 px-4 py-2 font-semibold text-white" type="submit">{{ $submitLabel }}</button>
        <a class="text-sm font-semibold text-gray-600" href="{{ route('admin.products.index') }}">Batal</a>
    </div>
</form>
