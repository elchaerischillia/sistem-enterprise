<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department; // Nama model singular
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    // Tampilkan semua employee beserta departemennya
    public function index() {
        // Mengambil semua data employee beserta data departemen terkait
        $employees = Employee::with('department')->get();

        // Menampilkan data di view 'admin.employees.index'
        return view('admin.employees.index', compact('employees'));
    }

    // Tampilkan form untuk membuat employee baru
    public function create() {
        $departments = Department::all(); // Ambil semua department untuk digunakan dalam form
        return view('admin.employees.create', compact('departments'));
    }

    // Simpan employee baru
    public function store(Request $request) {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id', // Validasi user_id harus ada di tabel users
            'depart_id' => 'required|integer|exists:departments,id', // Validasi departemen harus ada
            'address' => 'required|string|max:255',
            'place_of_birth' => 'required|string|max:255',
            'dob' => 'required|date',
            'religion' => 'required|string|max:50',
            'sex' => 'required|in:male,female',
            'phone' => 'required|string|max:20',
            'salary' => 'required|numeric',
        ]);

        Employee::create($validated); // Simpan data employee baru

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    // Tampilkan form untuk mengedit employee
    public function edit(Employee $employee) {
        $departments = Department::all(); // Ambil semua department untuk dropdown
        return view('admin.employees.edit', compact('employee', 'departments'));
    }

    // Update employee yang ada
    public function update(Request $request, Employee $employee) {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id', // Validasi user_id
            'depart_id' => 'required|integer|exists:departments,id',
            'address' => 'required|string|max:255',
            'place_of_birth' => 'required|string|max:255',
            'dob' => 'required|date',
            'religion' => 'required|string|max:50',
            'sex' => 'required|in:male,female',
            'phone' => 'required|string|max:20',
            'salary' => 'required|numeric',
        ]);

        $employee->update($validated); // Update data employee

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    // Hapus employee
    public function destroy(Employee $employee) {
        $employee->delete(); // Hapus employee
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
