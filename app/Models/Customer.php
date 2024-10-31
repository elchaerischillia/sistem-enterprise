<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];

    // Relasi many-to-many dengan promotions melalui tabel send_promotions
    public function promotions()
    {
        return $this->belongsToMany(Promotion::class, 'send_promotions')
                    ->withPivot('sent_date')
                    ->withTimestamps();
    }
}
