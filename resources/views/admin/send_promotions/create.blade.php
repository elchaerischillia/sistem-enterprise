@extends('admin.app')

@section('content')
<div class="container">
    <h3>Kirim Promosi</h3>
    
    <form action="{{ route('send_promotions.send') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="customer_id">Kustomer</label>
            <select name="customer_id" class="form-control" required>
                <option value="">Pilih Kustomer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }} - {{ $customer->email }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="promotion_id">Promosi</label>
            <select name="promotion_id" class="form-control" required>
                <option value="">Pilih Promosi</option>
                @foreach($promotions as $promotion)
                    <option value="{{ $promotion->id }}">{{ $promotion->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Kirim</button>
        <a href="{{ route('promotions.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
