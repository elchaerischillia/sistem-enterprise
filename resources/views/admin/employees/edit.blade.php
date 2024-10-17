<!-- resources/views/employees/edit.blade.php -->
@extends('admin.app')

@section('content')
<div class="container">
    <h1>Edit Employee</h1>
    <form action="{{ route('employees.update', $employees->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- User Selection -->
        <div class="form-group">
            <label for="user_id">User</label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $employees->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Department Selection -->
        <div class="form-group">
            <label for="department_id">Department</label>
            <select name="department_id" class="form-control" required>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $employees->department_id == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Address -->
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" value="{{ $employees->address }}" required>
        </div>

        <!-- Place of Birth -->
        <div class="form-group">
            <label for="place_of_birth">Place of Birth</label>
            <input type="text" name="place_of_birth" class="form-control" value="{{ $employees->place_of_birth }}">
        </div>

        <!-- Date of Birth -->
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" class="form-control" value="{{ $employees->dob }}">
        </div>

        <!-- Religion -->
        <div class="form-group">
            <label for="religion">Religion</label>
            <select name="religion" class="form-control" required>
                <option value="Islam" {{ $employees->religion == 'Islam' ? 'selected' : '' }}>Islam</option>
                <option value="Katolik" {{ $employees->religion == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                <option value="Protestan" {{ $employees->religion == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                <option value="Hindu" {{ $employees->religion == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                <option value="Budha" {{ $employees->religion == 'Budha' ? 'selected' : '' }}>Budha</option>
                <option value="Konghucu" {{ $employees->religion == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
            </select>
        </div>

        <!-- Sex -->
        <div class="form-group">
            <label for="sex">Sex</label>
            <select name="sex" class="form-control" required>
                <option value="Male" {{ $employees->sex == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $employees->sex == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <!-- Phone -->
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $employees->phone }}" required>
        </div>

        <!-- Salary -->
        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" name="salary" class="form-control" value="{{ $employees->salary }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection