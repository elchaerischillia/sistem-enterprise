<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

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

    // Relasi ke department: Setiap employee hanya punya satu department
    public function department() {
        return $this->belongsTo(Departments::class, 'depart_id'); // Foreign key adalah 'depart_id'
    }
}
