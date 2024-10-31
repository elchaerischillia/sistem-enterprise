@extends('admin.app')

@section('content')
<div class="container">
    <h3>Edit Promosi</h3>
    
    <form action="{{ route('promotions.update', $promotion->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ $promotion->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" class="form-control">{{ $promotion->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="start_date">Tanggal Mulai</label>
            <input type="date" name="start_date" class="form-control" value="{{ $promotion->start_date }}">
        </div>
        <div class="form-group">
            <label for="end_date">Tanggal Berakhir</label>
            <input type="date" name="end_date" class="form-control" value="{{ $promotion->end_date }}">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('promotions.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
