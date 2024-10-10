<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\DepartmentsSeeder;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
        PermissionSeeder::class,
        RoleSeeder::class,
        UserSeeder::class,
        DepartmentsSeeder::class,
        EmployeesSeeder::class,    // Seeder untuk employees
        ]);
    }
}
