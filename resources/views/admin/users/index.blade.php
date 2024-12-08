@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Daftar Users</h1>

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

        <!-- Tabel users -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>name</th>
                    <th>email</th>
                    <th>role</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datausers as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->email }}</td>
                        <td>{{ $d->role }}</td>
                        <td>
                            <!-- Form Delete -->
                            <form action="{{ route('admin.users.destroy', $d->user_id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus users ini?')">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tombol Tambah users -->
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Tambah users</a>
    </div>

    <!-- Tambahkan Bootstrap JS jika digunakan -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
@endsection
