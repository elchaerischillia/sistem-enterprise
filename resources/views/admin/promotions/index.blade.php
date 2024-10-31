@extends('admin.app')

@section('content')
<div class="container">
    <h3>Daftar Promosi</h3>
    <a href="{{ route('promotions.create') }}" class="btn btn-primary mb-3">Tambah Promosi</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Berakhir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($promotions as $promotion)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $promotion->title }}</td>
                <td>{{ $promotion->description }}</td>
                <td>{{ $promotion->start_date }}</td>
                <td>{{ $promotion->end_date }}</td>
                <td>
                    <a href="{{ route('promotions.edit', $promotion->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('promotions.destroy', $promotion->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
