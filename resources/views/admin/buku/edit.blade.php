<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Buku</h1>

        <!-- Form Edit Buku -->
        <form action="{{ route('admin.buku.update', $dataEditbuku->id_buku) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku</label>
                <input type="text" name="judul" id="judul" class="form-control" value="{{ $dataEditbuku->judul }}" required>
                @error('judul')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" name="penerbit" id="penerbit" class="form-control" value="{{ $dataEditbuku->penerbit }}" required>
                @error('penerbit')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input type="date" name="tahun_terbit" id="tahun_terbit" class="form-control" value="{{ $dataEditbuku->tahun_terbit }}" required>
                @error('tahun_terbit')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok Buku</label>
                <input type="number" name="stok" id="stok" class="form-control" value="{{ $dataEditbuku->stok }}" required>
                @error('stok')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">Detail Buku</label>
                <textarea name="detail" id="detail" class="form-control" rows="4" required>{{ $dataEditbuku->detail }}</textarea>
                @error('detail')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>
    </div>
</body>
</html>