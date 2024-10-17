<?php

namespace App\Models;

use App\Models\Employees;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employees extends Model
{
    use HasFactory, HasRoles;

    // Kolom-kolom yang dapat diisi melalui mass assignment
    protected $fillable = [
        'user_id',
        'depart_id',
        'address',
        'place_of_birth',
        'dob',
        'religion',
        'sex',
        'phone',
        'salary',
    ];

    /**
     * Definisi relasi dengan model User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Definisi relasi dengan model Department.
     */
    public function department()
    {
        return $this->belongsTo(Departments::class, );
    }
}
