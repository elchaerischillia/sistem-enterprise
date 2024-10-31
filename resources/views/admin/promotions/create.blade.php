@extends('admin.app')

@section('content')
<div class="container">
    <h3>Tambah Promosi</h3>
    
    <form action="{{ route('promotions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="start_date">Tanggal Mulai</label>
            <input type="date" name="start_date" class="form-control">
        </div>
        <div class="form-group">
            <label for="end_date">Tanggal Berakhir</label>
            <input type="date" name="end_date" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('promotions.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
