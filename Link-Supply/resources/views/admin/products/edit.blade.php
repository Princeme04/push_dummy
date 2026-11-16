<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk | LinkSupply</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
</head>
<body class="min-h-screen bg-gray-50 p-6 text-gray-900">
    <main class="mx-auto max-w-3xl rounded-xl border border-gray-200 bg-white p-6">
        <h1 class="mb-6 text-2xl font-bold">Edit Produk</h1>
        @include('admin.products.form', [
            'product' => $product,
            'categories' => $categories,
            'action' => route('admin.products.update', $product),
            'method' => 'PUT',
            'submitLabel' => 'Simpan Perubahan',
        ])
    </main>
</body>
</html>
