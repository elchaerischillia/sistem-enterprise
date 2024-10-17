<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'salary',
    ];

    // Hubungan dengan User (jika diperlukan)
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    public function employees()
    {
        return $this->belongsTo(Employees::class, 'user_id', 'user_id');
    }
}
