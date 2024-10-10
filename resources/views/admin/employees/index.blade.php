@extends('admin.app')

@section('content')
<div class="container">
    <h3>Employees</h3>

    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Tambah Employee</a>

    <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Department</th>
                <th>Address</th>
                <th>Place of Birth</th>
                <th>Date of Birth</th>
                <th>Religion</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Salary</th>
                <th>Actions</th> <!-- Kolom aksi untuk edit dan delete -->
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $loop->iteration }}</td> <!-- Iterasi untuk penomoran -->
                    <td>{{ $employee->user->name }}</td> <!-- Menampilkan nama user -->
                    <td>{{ $employee->department->name }}</td> <!-- Menampilkan nama department -->
                    <td>{{ $employee->address }}</td> <!-- Menampilkan alamat -->
                    <td>{{ $employee->place_of_birth }}</td> <!-- Menampilkan tempat lahir -->
                    <td>{{ $employee->dob->format('d-m-Y') }}</td> <!-- Menampilkan tanggal lahir -->
                    <td>{{ $employee->religion }}</td> <!-- Menampilkan agama -->
                    <td>{{ $employee->sex }}</td> <!-- Menampilkan jenis kelamin -->
                    <td>{{ $employee->phone }}</td> <!-- Menampilkan nomor telepon -->
                    <td>{{ number_format($employee->salary, 2) }}</td> <!-- Menampilkan gaji -->
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Edit</a>

                        <!-- Delete Button -->
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
