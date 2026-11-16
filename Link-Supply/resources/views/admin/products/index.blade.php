<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk | LinkSupply</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
</head>
<body class="min-h-screen bg-gray-50 p-6 text-gray-900">
    <main class="mx-auto max-w-6xl">
        <header class="mb-6 flex items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold">Kelola Produk</h1>
                <p class="mt-1 text-sm text-gray-600">Daftar produk yang tersimpan di database.</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.products.create') }}" class="rounded-lg bg-emerald-700 px-4 py-2 text-sm font-semibold text-white">Tambah Produk</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700">Keluar</button>
                </form>
            </div>
        </header>

        @if (session('status'))
            <p class="mb-4 rounded-lg bg-emerald-50 p-3 text-emerald-800" role="status">{{ session('status') }}</p>
        @endif

        <div class="overflow-x-auto rounded-xl border border-gray-200 bg-white">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-3">Produk</th>
                        <th class="px-4 py-3">Kategori</th>
                        <th class="px-4 py-3">Harga</th>
                        <th class="px-4 py-3">Stok</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($products as $product)
                        <tr>
                            <td class="px-4 py-3 font-medium">{{ $product->name }}</td>
                            <td class="px-4 py-3">{{ $product->category->name }}</td>
                            <td class="px-4 py-3">Rp {{ number_format($product->price, 0, ',', '.') }} / {{ $product->price_unit }}</td>
                            <td class="px-4 py-3">{{ number_format($product->stock, 0, ',', '.') }} {{ $product->stock_unit }}</td>
                            <td class="px-4 py-3">
                                <a class="font-semibold text-emerald-700" href="{{ route('admin.products.show', $product) }}">Lihat</a>
                                <a class="ml-3 font-semibold text-blue-700" href="{{ route('admin.products.edit', $product) }}">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td class="px-4 py-8 text-center text-gray-500" colspan="5">Belum ada produk.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">{{ $products->links() }}</div>
    </main>
</body>
</html>
