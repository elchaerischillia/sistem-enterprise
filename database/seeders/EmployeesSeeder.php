<?php

namespace Database\Seeders;

use App\Models\Employees;
use Illuminate\Database\Seeder;
use Database\Seeders\EmployeesSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            [
                'user_id' => 1,
                'department_id' => 1,
                'address' => 'Perumahan Graha Pelalawan',
                'place_of_birth' => 'Pangkalan Kerinci',
                'dob' =>'2003-06-08',
                'religion' => 'protestan',
                'sex' => 'Female',
                'phone' => '1122334455',
                'salary' => '5500000',
            ],
            
        ];
        
       foreach($employees as $employee) {
            Employees::create($employee);
        }
    }
}