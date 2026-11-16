<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} | Kelola Produk</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
</head>
<body class="min-h-screen bg-gray-50 p-6 text-gray-900">
    <main class="mx-auto max-w-3xl rounded-xl border border-gray-200 bg-white p-6">
        <nav class="mb-6 flex items-center justify-between gap-4">
            <a class="text-sm font-semibold text-gray-600" href="{{ route('admin.products.index') }}">← Daftar Produk</a>
            <a class="rounded-lg bg-blue-700 px-4 py-2 text-sm font-semibold text-white" href="{{ route('admin.products.edit', $product) }}">Edit Produk</a>
        </nav>

        @if (session('status'))
            <p class="mb-4 rounded-lg bg-emerald-50 p-3 text-emerald-800" role="status">{{ session('status') }}</p>
        @endif
        @if (session('error'))
            <p class="mb-4 rounded-lg bg-red-50 p-3 text-red-800" role="alert">{{ session('error') }}</p>
        @endif

        <h1 class="text-2xl font-bold">{{ $product->name }}</h1>
        <dl class="mt-5 grid gap-4 sm:grid-cols-2">
            <div><dt class="text-xs text-gray-500">Kategori</dt><dd>{{ $product->category->name }}</dd></div>
            <div><dt class="text-xs text-gray-500">Harga</dt><dd>Rp {{ number_format($product->price, 0, ',', '.') }} / {{ $product->price_unit }}</dd></div>
            <div><dt class="text-xs text-gray-500">Stok</dt><dd>{{ number_format($product->stock, 0, ',', '.') }} {{ $product->stock_unit }}</dd></div>
            <div><dt class="text-xs text-gray-500">Lokasi</dt><dd>{{ $product->location }}, {{ $product->province }}</dd></div>
            <div class="sm:col-span-2"><dt class="text-xs text-gray-500">Deskripsi</dt><dd class="whitespace-pre-line">{{ $product->description }}</dd></div>
        </dl>

        <form class="mt-8 border-t border-gray-200 pt-5" action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
            @csrf
            @method('DELETE')
            <button class="rounded-lg border border-red-300 px-4 py-2 text-sm font-semibold text-red-700" type="submit">Hapus Produk</button>
        </form>
    </main>
</body>
</html>
