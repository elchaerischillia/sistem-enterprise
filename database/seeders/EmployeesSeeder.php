<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee; // Pastikan model Employee sudah ada
use App\Models\Departments; // Pastikan model Departments sudah ada
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan ada departments di tabel departments
        if (Departments::count() == 0) {
            $this->command->info('No departments found, seeding departments first.');
            $this->call(DepartmentsSeeder::class); // Panggil seeder departments jika belum ada
        }

        // Membuat data employee contoh
        $employees = [
            [
                'user_id' => 1,
                'depart_id' => Departments::where('name', 'Human Resources')->first()->id,
                'address' => 'Jl. Kebon Jeruk 1',
                'place_of_birth' => 'Jakarta',
                'dob' => '1990-01-15',
                'religion' => 'Islam',
                'sex' => 'male',
                'phone' => '081234567890',
                'salary' => 5000000,
            ],
            [
                'user_id' => 2,
                'depart_id' => Departments::where('name', 'Finance')->first()->id,
                'address' => 'Jl. Kemang Timur',
                'place_of_birth' => 'Bandung',
                'dob' => '1985-04-20',
                'religion' => 'Kristen',
                'sex' => 'female',
                'phone' => '081234567891',
                'salary' => 6000000,
            ],
            [
                'user_id' => 3,
                'depart_id' => Departments::where('name', 'IT Support')->first()->id,
                'address' => 'Jl. Sudirman',
                'place_of_birth' => 'Surabaya',
                'dob' => '1992-07-30',
                'religion' => 'Islam',
                'sex' => 'male',
                'phone' => '081234567892',
                'salary' => 7000000,
            ],
        ];

        // Menyimpan data ke dalam tabel employees
        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
