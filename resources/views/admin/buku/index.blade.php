<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Buku</title>
    <!-- Tambahkan Bootstrap jika digunakan -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1>Daftar Buku</h1>

        <!-- Alert -->
        <div class="alert-container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        <!-- Tabel Buku -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($databuku as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->judul }}</td>
                        <td>{{ $d->penerbit }}</td>
                        <td>{{ $d->tahun_terbit }}</td>
                        <td>{{ $d->stok }}</td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="{{ route('admin.buku.edit', $d->id_buku) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Form Delete -->
                            <form action="{{ route('admin.buku.destroy', $d->id_buku) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus buku ini?')">Delete</button>
                            </form>

                            <a href="{{ route('admin.buku.detail', $d->id_buku) }}" class="btn btn-primary btn-sm">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tombol Tambah Buku -->
        <a href="{{ route('admin.buku.create') }}" class="btn btn-primary">Tambah Buku</a>
    </div>

    <!-- Tambahkan Bootstrap JS jika digunakan -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
