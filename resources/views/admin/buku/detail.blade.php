<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Detail Buku</h1>

        <div class="card">
            <div class="card-header">
                {{ $detailbuku->judul }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Penerbit: {{ $detailbuku->penerbit }}</h5>
                <p class="card-text"><strong>Tahun Terbit:</strong> {{ $detailbuku->tahun_terbit }}</p>
                <p class="card-text"><strong>Stok:</strong> {{ $detailbuku->stok }}</p>
                <p class="card-text"><strong>Sinopsis:</strong><br> {!! nl2br(e($detailbuku->detail)) !!}</p>
                <a href="{{ route('admin.buku.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</body>
</html>